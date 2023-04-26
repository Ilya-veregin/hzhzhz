<?php
header("Content-Type:text/html; charset=UTF-8");
require_once ("api/config.php");
require_once ("api/core.php");

if (isset($_GET['option'])){ //проверяем get параметр
    $class=trim(strip_tags($_GET['option'])); //очищаем его от HTML и PHP-теги и пробелы из начала и конца строки
    
}elseif (isset($_POST['option'])){ //проверяем get параметр
    $class=trim(strip_tags($_POST['option'])); //очищаем его от HTML и PHP-теги и пробелы из начала и конца строки 
}else {
    $class='main';
}

if(file_exists("api/".$class.".php")){
    require_once ("api/".$class.".php");
    if(class_exists("$class")){
        $obj = new $class;
        $obj->get_body();
    }else{
        exit("<p>Неверный класс</p>");
    }
}else{
    exit("<p>Неверный путь</p>");
}




?>