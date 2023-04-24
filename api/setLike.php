<?php
require_once("config.php"); 
//соединение с бд
$connect = new mysqli(HOST, USER, PASSWORD, DB);
if ($connect->connect_error){
    exit("Ошибка подключения к базе данных".$connect->connect_error);
}
//кодировка
$connect->set_charset("utf8");

$id = $_GET['id'];

$sql = "UPDATE `students` SET `num_like` = `num_like` + 1 WHERE `student_id` = $id";

$result = $connect->query($sql);
if($result){
    echo "ok";
}else{
    echo "error";
}
?>