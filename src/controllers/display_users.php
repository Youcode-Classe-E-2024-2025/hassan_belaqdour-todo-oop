
<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once "../../config/connectiondb.php";
include_once "../modules/User.php";

$database = new Database();
$db = $database->getConnection();
$user = new User($db);

$users = $user->getAll();
foreach($users as $user){
echo "<option value=''>" . $user["username"] . "</option>"; 
}
var_dump($users);
?>

