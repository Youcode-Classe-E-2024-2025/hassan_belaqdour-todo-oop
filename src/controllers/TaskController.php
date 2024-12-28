<?php

require_once "Task.php";

class TaskController {
    private $tasks = [];

    public function __construct() {
        $this->loadTasks();
    }

    // Create a new task
    public function createTask($title, $type, $assignee) {
        $task = new Task($title, $assignee, $type);
        $this->tasks[] = $task;
        $this->saveTasks();
        return $task;
    }

    // Update the status of a task
    public function updateTaskStatus($taskId, $newStatus) {
        foreach ($this->tasks as $task) {
            if ($task->getId() === $taskId) {
                $task->setStatus($newStatus);
                $this->saveTasks();
                return $task;
            }
        }
        return null;
    }

    // Get all tasks
    public function getAllTasks() {
        return $this->tasks;
    }

    // Get tasks by assignee
    public function getUserTasks($assignee) {
        return array_filter($this->tasks, function ($task) use ($assignee) {
            return $task->getAssignee() === $assignee;
        });
    }

    // Delete a task
    public function deleteTask($taskId) {
        $this->tasks = array_filter($this->tasks, function ($task) use ($taskId) {
            return $task->getId() !== $taskId;
        });
        $this->saveTasks();
    }

    private function saveTasks() {
        file_put_contents("tasks.json", json_encode($this->tasks));
    }

    private function loadTasks() {
        if (file_exists("tasks.json")) {
            $savedTasks = json_decode(file_get_contents("tasks.json"), true);
            foreach ($savedTasks as $taskData) {
                $task = new Task(
                    $taskData['title'],
                    $taskData['assignee'],
                    $taskData['type'],
                    $taskData['status']
                );
                $this->tasks[] = $task;
            }
        }
    }
}

?>
