<?php
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false);
$conn = new mysqli("localhost", "root", "root", "erp");

$stmt = $conn->prepare("insert into attendence (id,present,attenddate) values (?,?,curdate())");
$stmt->bind_param("ii", $obj->id,$obj->present);
$stmt->execute();
?>