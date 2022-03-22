<?php 
include('../../Databast/database.php');
session_start();
//if (isset($_SESSION['username'])) {
//$username=$_SESSION['username'];
$Admin = mysqli_query($conn, "SELECT idAdmin FROM Admin WHERE Admin_username='mamean888'");
$rs = mysqli_fetch_array($Admin);
$query = mysqli_query($conn, "SELECT * FROM Subject WHERE Subject.idAdmin='$rs[0]'");
while ($row = mysqli_fetch_array($query)) {
echo '<a href="./subject-home/subject-homepage.php?Subject_name="'.$row['Subject_name'].'""></a><button class="add-subject" type="button">'.$row['Subject_name'].'</button></a>';
}
//}
?>