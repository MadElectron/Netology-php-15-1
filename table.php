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
        <?php $tabName = $_GET['table'] ?? ''; ?>
        <h1><?= $tabName ?></h1>
        <p><a href="addColumn.php?table=<?= $tabName ?>">Добавить столбец</a></p>
        <table>
            <tr>
                <th>Имя</th>
                <th>Тип</th>
                <th>Null</th>
                <th>Ключ</th>
                <th>По умолчанию</th>
                <th>Доп. информация</th>
                <th colspan="3">Действия</th>
            </tr>
            <?php foreach($db->describe($tabName) as $column) : ?>
            <tr>
                <td><?= $column['Field'] ?></td>
                <td><?= $column['Type'] ?></td>
                <td><?= $column['Null'] ?></td>
                <td><?= $column['Key'] ?></td>
                <td><?= $column['Default'] ?></td>
                <td><?= $column['Extra'] ?></td>
                <?php
                    $typeValue = preg_split('/(\(|\))/',$column['Type']);
                    $pureType = $typeValue[0];
                    $pureValue = $typeValue[1] ?? '';
                ?>                    
                <td>
                    <form action="" method="post" accept-charset="utf-8">
                        <button type="submit" name="drop" value="<?= $column['Field'] ?>">Удалить</button>
                    </form>     
                </td>
                <td>
                    <form action="" method="post" accept-charset="utf-8">
                        <input type="text" name="new_name" value="" placeholder="Новое имя">
                        <button type="submit" name="rename" value="<?= $column['Field'] ?>">Переименовать</button>

                    </form>                        
                </td>
                <td>
                    <form action="" method="post" accept-charset="utf-8">

                        <select name="type">
                        <?php foreach($db->getAllowedTypes() as $gname => $group) : ?>
                            <optgroup label="<?= $gname ?>">
                            <?php foreach($group as $type) : ?>

                                <option value="<?= $type ?>" <?= $type == strtoupper($pureType) ? 'selected' : '' ?>><?= $type ?></option>
                            <?php endforeach ?> 
                            </optgroup>
                        <?php endforeach ?> 
                        </select>

                        <input type="text" name="type_value" value="<?= $pureValue ?>" placeholder="Длина/Значения">

                        <label>
                            <input type="checkbox" name="nullable" value="1" <?= $column['Null'] == 'YES' ? 'checked' : '' ?>>
                            NULL
                        </label>

                        <button type="submit" name="change_type" value="<?= $column['Field'] ?>">Сменить тип</button>

                    </form>                         
                </td>
            </tr>
            <?php endforeach ?>
        </table>
        <hr>
        <a href="index.php">К списку таблиц</a>
    </div>
</body>
</html>