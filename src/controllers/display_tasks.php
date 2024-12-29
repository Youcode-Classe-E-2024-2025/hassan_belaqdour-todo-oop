<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once "../../config/connectiondb.php";
include_once "../modules/Task.php";

$database = new Database();
$db = $database->getConnection();
$taske = new Task($db);

$tasks = $taske->getAllTasks();
foreach($tasks as $task){
    echo "
    
    <tr>
        <td value='" . htmlspecialchars($task["title"]) . "'>" . htmlspecialchars($task["title"]) . "</td>
        <td value='" . htmlspecialchars($task['type']) . "'>" . htmlspecialchars($task['type']) . "</td>
        <td value='" . htmlspecialchars($task['status']) . "'>" . htmlspecialchars($task['status']) . "</td>
        <td value='" . htmlspecialchars($task['assignee']) . "'>" . htmlspecialchars($task['assignee']) . "</td>
        <td>
        <select name='new_status' id='". $task["id"]."'>
            <option value='pending'>En attente</option>
            <option value='in-progress'>En cours</option>
            <option value='completed'>Terminée</option>
        </select>
        </td>
    </tr>
    ";
}
?>