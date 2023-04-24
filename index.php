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
    require_once("api/config.php");  

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
                echo "<div class='student' data-id='$row[student_id]'>
                    $row[fname],$row[lname],$row[gender],$row[age]
                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-bookmark-heart-fill like' viewBox='0 0 16 16'><path d='M2 15.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v13.5zM8 4.41c1.387-1.425 4.854 1.07 0 4.277C3.146 5.48 6.613 2.986 8 4.412z'/>
                    </svg><span class='num-like'>$row[num_like]</span>
                    </div>";
            }?>
        </div>
        <div class="block_2">
            <form id="form-insert-group">
                <input type="text" name="title" id="title" placeholder="Введите название группы"><br>
                <input type="submit" value="добавить">
            </form>
            <?php
            $sql = "SELECT * FROM `groups`";
            $result_g = $connect->query($sql);
            while($row = $result_g->fetch_assoc()){
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