<?php

include('../../../Databast/database.php');
session_start();

//if (isset($_SESSION['username'])) {
//$username=$_SESSION['username'];
$Admin = mysqli_query($conn, "SELECT idAdmin FROM Admin WHERE Admin_username='mamean888'");
$rs = mysqli_fetch_array($Admin);
    $query_subj = mysqli_query($conn, "SELECT * FROM Subject WHERE Subject.idAdmin='$rs[0]'");
    while ($row = mysqli_fetch_array($query_subj)) {
        echo '
        <div class="detail1">
          <div class="text">
            <img class="roundpic" src="../img/E4eLarNVEAM7n4T.jfif" alt="pic">
          </div>
          <div class="content1">
            <p><span>วิชา : </span>'. $row['Subject_name'] .'</p>
            <br>
          </div>
        </div>
        <div id="line"></div> ';
    }

//}
