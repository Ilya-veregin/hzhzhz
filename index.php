<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="insertStudent.php" method="POST">
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
  require_once("config.php");  

//соединение с бд
$connect = new mysqli(HOST, USER, PASSWORD, DB);
if ($connect->connect_error){
    exit("Ошибка подключения к базе данных".$connect->connect_error);
}
//кодировка
$connect->set_charset("utf8");
//запрос
$sql = "SELECT * FROM `students`";
//
$result = $connect->query($sql);

while($row = $result->fetch_assoc()){
    echo "<div>
        $row[lname],$row[fname],$row[gender],$row[age]
        </div>";
    //print_r($row);
}



?>
</body>
</html>