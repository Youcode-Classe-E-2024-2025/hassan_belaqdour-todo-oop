<?php 

class User {

    protected $fullName;
    protected $email;
    protected $motdepasse;

    public function __construct($fullName, $email, $motdepasse) {
        $this->fullName = $fullName;
        $this->email = $email;
        $this->motdepasse = $motdepasse;
    }

    public function add_data($conn) {
        $query = $conn->prepare("INSERT INTO users (fullname, email, password) values (:fullName, :email, :motdepasse)");
        $query->bindParam(":fullName", $this->fullName);
        $query->bindParam(":email", $this->email);
        $query->bindParam(":motdepasse", $this->motdepasse);
        $query->execute();
    }
    public function read_data($conn, $id) {
        $query = $conn->prepare("SELECT * FROM users WHERE id = :id");
        $query->bindParam(":id", $id);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function update_data($conn, $id) {
        $query = $conn->prepare("UPDATE users SET fullname = :fullName, email = :email, password = :motdepasse WHERE id = :id");
        $query->bindParam(":fullName", $this->fullName);
        $query->bindParam(":email", $this->email);
        $query->bindParam(":motdepasse", $this->motdepasse);
        $query->bindParam(":id", $id);
        $query->execute();
    }

    public function delete_data($conn, $id) {
        $query = $conn->prepare("DELETE FROM users WHERE id = :id");
        $query->bindParam(":id", $id);
        $query->execute();
    }

}
?>