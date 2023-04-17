<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script defer src="js.js"></script>
    <title>MAIN-PROJECT</title>
</head>
<body>
<div class="content">
    <?php
    require_once("config.php");  

    //соединение с бд
    $connect = new mysqli(HOST, USER, PASSWORD, DB);
    if ($connect->connect_error){
        exit("Ошибка подключения к базе данных".$connect->connect_error);
    }
    //кодировка
    $connect->set_charset("utf8");
    
    
    ?>
    <div class="blocks">
        <div class="block_1">
            <form id="form-insert-student">
                <input type="text" name="fname" id="fname" placeholder="Введите имя"><br>
                <input type="text" name="lname" id="lname" placeholder="Введите фамилию"><br>
                <input type="number" name="age" id="age" placeholder="Введите возраст"><br>
                <input type="radio" name="gender" id="m" value="m" checked>
                <label for="m">мужской</label>
                <input type="radio" name="gender" id="f" value="f">
                <label for="f">женский</label><br>
                <input type="submit" value="добавить">
            </form>
            <?php
            //запрос
            $sql = "SELECT * FROM `students`";
            $result = $connect->query($sql);
            while($row = $result->fetch_assoc()){
                echo "<div>
                    $row[fname],$row[lname],$row[gender],$row[age]
                    </div>";
            }?>
        </div>
        <div class="block_2">
            <form id="form-insert-group">
                <input type="text" name="title" id="title" placeholder="Введите название группы"><br>
                <input type="submit" value="добавить">
            </form>
            <?php
            $sql_g = "SELECT * FROM `groups`";
            $result_g = $connect->query($sql_g);
            while($row = $result->fetch_assoc()){
                echo "<div>
                    $row[groups_id],$row[title]
                    </div>";
            }?>
        </div>
    </div>
</div>
<DIV class="message"></DIV>
</body>
</html>