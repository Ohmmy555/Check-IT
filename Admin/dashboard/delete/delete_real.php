<?php
	include('../../../Databast/database.php');
	$idSubject=$_GET['idSubject'];
    $idyear=$_GET['idyear'];
    $term_num=$_GET['term_num'];
	mysqli_query($conn,"delete from subject_detail where idSubject='$idSubject' and idyear='$idyear' and term_num='$term_num'");
	header('location:delete.php');

?>