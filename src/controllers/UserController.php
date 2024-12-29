<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once "../../config/connectiondb.php";
include_once "../modules/User.php";


class UserController {
    private $db;
    private $user;

    public function __construct() {
        $conn = new Database();
        $this->db = $conn->getConnection();
        $this->user = new User($this->db);
    }

    public function register() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->user->username = $_POST['username'];
            $this->user->email = $_POST['email'];
            $this->user->password = $_POST['password'];
            
            if($this->user->create()) {
                header("Location: ../../src/views/login_form.php");
            } else {
                return "Registration failed!";
            }
        }
    }

    public function login() {
       
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user_data = $this->user->login($email, $password);
            if($user_data) {
                session_start();
                $_SESSION['user_id'] = $user_data['id'];
                $_SESSION['username'] = $user_data['username'];
                header("Location: ../../index.php");
            } else {
                echo "Invalid credentials!";
            }
        }
    }
}
if(isset($_POST["btn_sign_up"])){
    $res = new UserController() ;
    $res->register();
}
if(isset($_POST["btn_login"])){
    $res = new UserController() ;
    $res->login(); 
}



?>