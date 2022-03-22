<?php
include('../../../Databast/database.php');
session_start();

if (isset($_SESSION['username'])) {
 $username = $_SESSION['username'];
 $Admin = mysqli_query($conn, "SELECT idAdmin FROM Admin WHERE Admin_username='$username'");
  $rs = mysqli_fetch_array($Admin);
$Subject_name=$POST_['Subject_name'];
$idSubject=$POST_['Subject_ID'];
$Subject_description=$POST_['Subject_Detail'];
mysqli_query($conn,"insert into Subjecct (idSubject,Subject_name,Subject_description,idAdmin) values ('$idSubject','$Subject_name','$Subject_description','$rs[0]')");
	header('location:firstpage.php');
}
    ?>
