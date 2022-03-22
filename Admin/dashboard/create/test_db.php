<?php 
include('../../../Databast/database.php');
//$Admin = mysqli_fetch_array(mysqli_query($conn, "SELECT idAdmin FROM admin WHERE Admin_username='Ohmmy_2001'"));
$Admin = mysqli_query($conn, "SELECT idAdmin FROM Admin WHERE Admin_username='mamean888'");
$rs = mysqli_fetch_array($Admin);
    $query_subj = mysqli_query($conn, "SELECT * FROM Subject WHERE Subject.idAdmin='$rs[0]'");
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

?>