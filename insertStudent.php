<?php
$lname = $_POST['lname'];
$fname = $_POST['fname'];
$age = $_POST['age'];
$gender = $_POST['gender'];

require_once("config.php"); 
//соединение с бд
$connect = new mysqli(HOST, USER, PASSWORD, DB);
if ($connect->connect_error){
    exit("Ошибка подключения к базе данных".$connect->connect_error);
}
//кодировка
$connect->set_charset("utf8");

$sql = "INSERT INTO `students`(`fname`, `lname`, `gender`, `age`) VALUES ('$lname','$fname','$gender',$age)";

$result = $connect->query($sql);

if($result){
    echo "Данные о студенте добавлены";
    header("Location:index.php");
}else{
    echo "Ошибка добавления студента";
}



?>