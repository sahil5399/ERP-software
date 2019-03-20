<?php
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false);
$conn = new mysqli("localhost", "root", "root", "erp");

$stmt = $conn->prepare("select employee.id,empfname,emplname,present,attenddate from employee,attendence where attendence.id=employee.id and salpaid=0 and employee.id=?");
$stmt->bind_param("i", $obj->id);
$stmt->execute();
$result = $stmt->get_result();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);
?>