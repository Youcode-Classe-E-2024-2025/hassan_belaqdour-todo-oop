<?php

include_once "../modules/user.php";
if(isset($_POST["btn_sign_up"])){
    $user = new user($_POST["firstname"],$_POST["email"],$_POST["password"]);
    $res = $user->show_data();
    echo $res;
}


?>