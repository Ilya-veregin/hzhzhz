<?php
$groups_id = $_POST['groups_id'];
$title = $_POST['title'];


require_once("config.php"); 
//соединение с бд
$connect = new mysqli(HOST, USER, PASSWORD, DB);
if ($connect->connect_error){
    exit("Ошибка подключения к базе данных".$connect->connect_error);
}
//кодировка
$connect->set_charset("utf8");

$sql = "INSERT INTO `groups`(`title`) VALUES ('$title')";

$result = $connect->query($sql);
sleep(3);
if($result){
    echo "ok";
}else{
    echo "error";
}



?>