<?php

class Task {
    private $conn;
    private $table_name = "tasks";

    public $id;
    public $title;
    public $type;    
    public $status;   
    public $assignee; 
    public $created_at;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . 
                " (title, type, status, assignee, created_at) VALUES
                (:title, :type, :status, :assignee, NOW())";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":type", $this->type);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":assignee", $this->assignee);

        return $stmt->execute();
    }

    public function updateStatus($taskId, $newStatus) {
        $query = "UPDATE " . $this->table_name . 
                " SET status = :status WHERE id = :id";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":status", $newStatus);
        $stmt->bindParam(":id", $taskId);
        
        return $stmt->execute();
    }

    public function getAllTasks() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function getTasksByAssignee($assignee) {
        $query = "SELECT * FROM " . $this->table_name . 
                " WHERE assignee = ? ORDER BY created_at DESC";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $assignee);
        $stmt->execute();
        
        return $stmt;
    }
}
?>
