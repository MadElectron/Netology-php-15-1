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
        <h1>Создать таблицу</h1>
        <form action="" method="post" accept-charset="utf-8">
        <input type="text" name="table_name" value="" placeholder="Название таблицы">
        <table>
            <tr>
                <th>Имя</th>
                <th>Ключ</th>
                <th>Тип</th>
                <th>Длина/значение</th>
                <th>Null</th>
            </tr>
            <?php $columnsCount = $controller->getColumnsCount(); ?>
            <?php for($i = 0; $i < $columnsCount; $i++) : ?>
            <tr>
                <td>
                    <input type="text" name="name<?= $i ?>" value="">
                </td>
                <td>
                    <input type="checkbox" name="key<?= $i ?>" value="1">
                </td>
                <td>
                    <select name="type<?= $i ?>">
                    <?php foreach($db->getAllowedTypes() as $gname => $group) : ?>
                        <optgroup label="<?= $gname ?>">
                        <?php foreach($group as $type) : ?>

                            <option value="<?= $type ?>"><?= $type ?></option>
                        <?php endforeach ?> 
                        </optgroup>
                    <?php endforeach ?> 
                    </select>                     
                </td>
                <td>
                    <input type="text" name="type_value<?= $i ?>" value="">
                </td>
                <td>
                    <input type="checkbox" name="nullable<?= $i ?>" value="1">
                </td>
            </tr>
            <?php endfor ?>
        </table>
        <button type="submit" name="create" value="1">Создать</button>
        </form>
        <hr>
        <a href="index.php">К списку таблиц</a> 
    </div>  
</body>
</html>