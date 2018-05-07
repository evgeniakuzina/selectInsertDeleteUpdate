<?php

$pdo = new PDO("mysql:host=localhost;dbname=tasks;charset=utf8", "root", "");

if (isset($_POST['sort'])) {
    $typeOfSort = $_POST['sort'];
    $sql = "SELECT * FROM tasks ORDER BY $typeOfSort";
    
}
else {
    $sql = "SELECT * FROM tasks";
}


if (isset($_GET['id'])) {
    $taskId = $_GET['id'];
    $taskAction = $_GET['action'];

    if ($taskAction == 'delete') {
        $sqlQuery = "DELETE FROM tasks WHERE id=$taskId"; 
    }
    else {
        $sqlQuery = "UPDATE tasks SET is_done = 1 WHERE id=$taskId";
    }

    $pdo->query($sqlQuery);

    header("Location: index.php");
    exit();

}
if (isset($_POST['description'])) {
    $sqlQuery = "INSERT INTO tasks (description) VALUES (?)";
    $statement = $pdo->prepare($sqlQuery);
    $statement->execute([
    (string)($_POST['description'])
    ]);
    
    header("Location: index.php");
    exit();
}
    
    
?>