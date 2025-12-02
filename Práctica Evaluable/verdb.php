<?php

$HOST = "localhost";
$USER = "root";
$PASS = "";
$DB = "practicaclases";

$conn = new mysqli($HOST,$USER,$PASS, $DB, port:3306);

$sql = "Show tables from ".$DB;

$res = $conn->query($sql);

var_dump($res);
$data=[];
while ($row = $res->fetch_assoc()) $data[] = $row;
var_dump($data);

echo "<br><br>";

var_dump($data[0]["Tables_in_".$DB]);

echo "<br><br>";

echo($data[0]["Tables_in_".$DB]);

echo "<br><br>";

$i=0;
foreach($data as $row_){
    echo $i.": ".$row_["Tables_in_".$DB]."<br>";
    $i++;
}

$sql = "SELECT * FROM ".$data[0]["Tables_in_".$DB];
echo $sql;

$res= $conn->query($sql);
echo "<br><br>";
var_dump($res);

while ($row = $res->fetch_assoc()) $data[] = $row;
