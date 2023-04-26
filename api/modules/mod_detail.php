<?php
    /* создание подготавливаемого запроса */
    $result = $this->connect->prepare("SELECT * FROM students WHERE student_id=?");
    /* связывание параметров с метками */
    $result->bind_param("i", $id);
    /* выполнение запроса */
    $result->execute();
    /* получение данных*/
    $rows = $result->get_result();

    if (!$rows) {
        echo "<p>Данных нет</p>";
    } else {
    
        echo "<p class='back'><a href='./'>Назад</a></p>";
        $myrow  =  $rows->fetch_assoc();

        //обработка слова
        $i = 0;
        $t1 = $myrow['age'] % 10;
        $t2 = $myrow['age'] % 100;
        if($t1 == 1 && $t2 != 11) {
            $word = "год";$i = $i + 1;
        }elseif($t1 >= 2 && $t1 <= 4 && ($t2 < 10 || $t2 >= 20)) {
            $word = "года";$i = $i + 1;
        }elseif($i==0){
            $word = "лет";
        }
        //конец обработки слова
        
        echo "<div>
        <a href='?option=details&id=$myrow[student_id]'>$myrow[lname] $myrow[fname] | $myrow[age] $word</a>
        </div>"; //выводим строки таблицы
    }
