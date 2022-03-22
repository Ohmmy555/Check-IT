<?php
	include('../../../Databast/database.php');
	$idSubject=$_GET['idSubject'];
    $Student_name=$_GET['Student_name'];
	mysqli_query($conn,"DELETE from Enroll where idSubject='$idSubject' and Student_name='$Student_name' ");
	header('location:std.php');

?>