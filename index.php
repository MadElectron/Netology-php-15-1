<?php 
    require_once 'app.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Database editor</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Database editor</h1>
        <hr>
        <h2>Список таблиц БД "<?= $dbname ?>"</h2>
        <a href="create.php">Создать таблицу</a>
        <?php $tables = $db->showTables(); ?>
        <?php if (!$tables): ?>
            <p><em>Нет таблиц</em></p>
        <?php else : ?>
        <table>
            <tr>
                <th>Имя</th>
                <th colspan="2">Действия</th>
            </tr>
        <?php foreach($tables as $table) : ?>
            <?php $tabName = $table[0]; ?>
            <tr>
                <td><a href="table.php?table=<?= $tabName?>"><?= $tabName ?></a></td>
                <td>
                    <form action="" method="post" accept-charset="utf-8">
                        <button type="submit" name="drop" value="<?= $tabName ?>">Удалить</button>
                    </form>
                </td>
                <td>     
                    <form action="" method="post" accept-charset="utf-8">
                        <input type="text" name="new_name" value="" placeholder="Новое имя">
                        <button type="submit" name="rename" value="<?= $tabName ?>">Переименовать</button>
                    </form>
                </td>
            </tr>            
        <?php endforeach ?>
        </table>
        <?php endif ?>
    </div>
</body>
</html>