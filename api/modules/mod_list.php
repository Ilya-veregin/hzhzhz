<form method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>">
<label for="age"></label>
<input type="range" id="age" name="age" min="0" value="100" max="100" step="1" oninput="level.value = age.valueAsNumber" >
<output for="age" name="level">100</output><br>
<input type="radio" name="sort-age" id="ASC" value="ASC" checked> 
<label for="ASC">По увеличению</label>
<input type="radio" name="sort-age" id="DESC" value="DESC">
<label for="DESC">По убыванию</label><br>
<input type="submit" value="Фильтровать">
</form>

<?php
$extra_sql = " ";
$sort_age = "ASC";
if(isset($_POST['age'])){
    $age = $this->formatstr($_POST['age']);
    $extra_sql .= "WHERE age < $age";
}
if(isset($_POST['sort-age'])){
    $sort_age = $this->formatstr($_POST['sort-age']);
    $extra_sql .= " ORDER BY age $sort_age";
}

$result=$this->connect->query("SELECT * FROM students".$extra_sql);
//print_r("SELECT * FROM students".$extra_sql);
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