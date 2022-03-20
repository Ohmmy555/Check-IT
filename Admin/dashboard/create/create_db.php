<?php

include('conn.php');
session_start();

if (isset($_SESSION['username'])) {
$username=$_SESSION['username'];
$Admin = mysqli_fetch_array(mysqli_query($conn, "SELECT idAdmin FROM admin WHERE Admin_username='$username'"));
$query_subj = mysqli_query($conn, "SELECT * FROM Subject WHERE Subject.idAdmin='$Admin[0]'");
while ($row = mysqli_fetch_array($query_subj)) {
    echo '
    div class="detail2">
      <div class="text">
        <img class="roundpic" src="img/E4eLarNVEAM7n4T.jfif" alt="pic">
      </div>
      <div class="content1">
        <p><span>วิชา : </span>'. $row['Subject_name'] .'</p>
        <br>
      </div>
    </div>
    <div id="line"></div> ';
}
}
?>