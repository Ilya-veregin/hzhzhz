<form method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>">
<label for="age"></label>
<input type="range" id="age" name="age" min="0" value="110" max="110" step="1" oninput="level.value = age.valueAsNumber" >
<output for="age" name="level">110</output>
<input type="submit" value="Фильтровать">
</form>

<?php
$extra_sql = " ";
if(isset($_POST['age'])){
$age = $this->formatstr($_POST['age']);
$extra_sql .= "WHERE age < $age";
}

$result=$this->connect->query("SELECT * FROM students".$extra_sql);
foreach ($result as $myrow) { //цикл от 0 до количество строк в массиве
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















?>