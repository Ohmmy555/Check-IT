<?php
	include('../../../Databast/database.php');
	$idSubject=$_GET['idSubject'];
    $year=$_GET['year'];
    $term_num=$_GET['term_num'];
	mysqli_query($conn,"delete from subject_detail where idSubject='$idSubject' and year='$year' and term_num='$term_num'");
	header('location:delete.php');

?>