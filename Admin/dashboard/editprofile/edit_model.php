<?php
include('../../../Databast/database.php');


//session_start();

//if (isset($_SESSION['username'])) {
// $username = $_SESSION['username'];
$Admin = mysqli_query($conn, "SELECT idAdmin FROM Admin WHERE Admin_username='mamean888'");
$rs = mysqli_fetch_array($Admin);

$Admin_fname = $POST_['fname'];
$Admin_lname = $POST_['lname'];

$file = $_FILES['imgfile'];
$filename = $_FILES["imgfile"]["name"];
$filTmpename = $_FILES["imgfile"]["tmp_name"];
$fileExt = explode(".", $filename);
$fileAcExt = strtolower(end($fileExt));
$newFilename = time() . "." . $fileAcExt;
$fileDes = 'upload_img/' . $newFilename;
move_uploaded_file($filTmpename, $fileDes);
$imgfilelocation = $fileDes;

mysqli_query($conn, "update Admin set Admin_fname='$Admin_fname', Admin_lname='$Admin_lname', Admin_picture='$imgfilelocation' where idAdmin='$rs[0]'");
header('location:editprofile.php');
		//}
?>