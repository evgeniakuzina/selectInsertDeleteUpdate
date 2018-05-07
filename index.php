<?php

require("functions.php"); 

?>

<!DOCTYPE html>
<html>
<head>
    <title>TODO-лист</title>
</head>
<body>
    <h1>Список дел на сегодня</h1>
    <form action="" method="POST">
        <input type="text" name="description" placeholder="Описание задачи">
        <input type="submit" value="Добавить">
    </form>
    <p>Сортировать задачи по:</p>
    <form action="" method="POST">
        <select name="sort">
            <option value="date_added">Дате добавления</option>
            <option value="is_done">Статусу</option>
            <option value="description">Описанию</option>
        </select>
        <input type="submit" value="Отсортировать">
    </form>
    <br>
    <table border="1" width="80%">
        <thead style="font-weight: bold">
            <tr>
                <td>Описание задачи</td>
                <td>Дата добавления</td>
                <td>Статус</td>
                <td>Действия</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pdo->query($sql) as $row) : ?>
                <tr>
                    <td><?php echo $row['description'] ?></td>
                    <td><?php echo $row['date_added'] ?></td>
                    <td style="color: <?php echo $row['is_done'] == 0 ? "orange" : "green" ?>"><?php echo $row['is_done'] == 0 ? "В процессе" : "Выполнено" ?></td>
                    <td><a href="?id=<?php echo $row['id'] ?>&action=is_done">Выполнить</a> <a href="?id=<?php echo $row['id'] ?>&action=delete">Удалить</a></td>
                </tr>
            <?php endforeach; ?>   
        </tbody>
</body>
</html>