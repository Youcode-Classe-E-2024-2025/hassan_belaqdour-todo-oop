<?php

class Task {
    protected $id;
    protected $title;
    protected $assignee;
    protected $status;
    protected $type;

    public function __construct($title, $assignee, $type = "basic", $status = "todo") {
        $this->id = uniqid();
        $this->title = $title;
        $this->assignee = $assignee;
        $this->type = $type;
        $this->status = $status;
    }

  
    public function getId() { return $this->id; }
    public function getTitle() { return $this->title; }
    public function getAssignee() { return $this->assignee; }
    public function getStatus() { return $this->status; }
    public function getType() { return $this->type; }


    public function setStatus($status) {
        if (in_array($status, ['todo', 'in-progress', 'done'])) {
            $this->status = $status;
        }
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setAssignee($assignee) {
        $this->assignee = $assignee;
    }
}
?>
