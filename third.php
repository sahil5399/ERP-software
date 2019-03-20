<?php
	header("Content-Type: application/json; charset=UTF-8");
	$con = mysqli_connect("localhost","root","root","erp");
    $result=mysqli_query($con,"select * from employee order by empfname;");
	$abc=mysqli_fetch_all($result,MYSQLI_ASSOC);
	echo json_encode($abc);
?>