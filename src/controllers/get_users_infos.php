<?php
include_once "../config/connectiondb.php";
include_once "../modules/user.php";

if(isset($_POST["btn_sign_up"])){
    $db = new DatabaseConnection();
    $conn = $db->getConnection();

    $name = $_POST["firstname"];
    $email = $_POST["email"];
    $pass = $_POST["password"];

    $user = new User($name, $email, $pass);
    $user->add_data($conn);
    var_dump($user);

    $db->closeConnection();
}

?>