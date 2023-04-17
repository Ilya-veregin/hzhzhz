<?php
$sql = "SELECT * FROM `students`";
//
$result = $this->connect->query($sql);

while($row = $result->fetch_assoc()){
    echo "<div>
        $row[lname],$row[fname],$row[gender],$row[age]
        </div>";
}














?>