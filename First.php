<?php
	header("Content-Type: application/json; charset=UTF-8");
	$con=mysqli_connect("localhost","root","root","erp");
	$result=mysqli_query($con,"select employee.id, employee.empfname, employee.emplname, attendence.present from employee,attendence where attendence.id=employee.id and attenddate=curdate();");
	$abc=mysqli_fetch_all($result,MYSQLI_ASSOC);
	echo json_encode($abc);
?>