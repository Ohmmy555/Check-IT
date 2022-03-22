<?php
	include('../../../Databast/database.php');
	$idSubject=$_GET['idSubject'];
    $year=$_GET['year'];
    $term_num=$_GET['term_num'];
	mysqli_query($conn,"DELETE from Subject where idSubject='$idSubject'");
	header('location:delete.php');

?>