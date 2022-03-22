<?php
include('../../../Databast/database.php');


//session_start();

//if (isset($_SESSION['username'])) {
 // $username = $_SESSION['username'];
  $Admin = mysqli_query($conn, "SELECT idAdmin FROM Admin WHERE Admin_username='mamean888'");
  $rs = mysqli_fetch_array($Admin);
  $query_subj = mysqli_query($conn, "SELECT * FROM Subject JOIN Subject_detail ON(Subject.idSubject=Subject_detail.idSubject) JOIN Term ON(Subject_detail.idTerm=Term.idTerm) JOIN TA_has_Subject ON(Subject_detail.idSubject=TA_has_Subject.idSubject) JOIN TA ON(TA_has_Subject.idTA=TA.idTA) WHERE Subject_detail.idAdmin='$rs[0]'");
  while ($row = mysqli_fetch_array($query_subj)) {
    echo '<div class="detail1"> 
  
          <div class="text">
            <img class="roundpic" src="../img/E4eLarNVEAM7n4T.jfif" alt="pic">
          </div>
          <div class="content1">
            <p><span>วิชา :' . $row['Subject_name'] . '</p>
            <p><span>ผู้สอน : </span> ' . $row['TA_fname'] . ' ' . $row['TA_lname'] . '</p>
            <p><span>ปีการศึกษา : </span> ' . $row['year'] . ' &nbsp; <span>ภาคเรียน : </span>' . $row['term_num'] . '</p>
          </div>
        </div>
    
        <div id="line"></div>';
  }
//}
?>