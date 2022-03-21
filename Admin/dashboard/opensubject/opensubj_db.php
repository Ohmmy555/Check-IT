<?php
    include('../../../Databast/database.php');
    session_start();
    
   if (isset($_SESSION['username'])) {
    $username=$_SESSION['username'];
      $Admin = mysqli_fetch_array(mysqli_query($conn, "SELECT idAdmin FROM admin WHERE Admin_username='$username'"));
      $query_subj = mysqli_query($conn, "SELECT * FROM Subject JOIN Subject_detail1 ON(subject.idSubject=Subject_detail1.idSubject) JOIN ta ON(ta.idTA=Subject_detail1.idTA) JOIN term ON(term.idterm=Subject_detail1.idterm) WHERE Subject_detail1.idAdmin='$Admin[0]'");
      while ($row = mysqli_fetch_array($query_subj)) {
        echo '<div class="detail1"> 
  
          <div class="text">
            <img class="roundpic" src="img/E4eLarNVEAM7n4T.jfif" alt="pic">
          </div>
          <div class="content1">
            <p><span>วิชา :' . $row['Subject_name'] . '</p>
            <p><span>ผู้สอน : </span> ' . $row['TA_fname'].' ' . $row['TA_lname'] . '</p>
            <p><span>ปีการศึกษา : </span> ' . $row['idyear'] . ' &nbsp; <span>ภาคเรียน : </span>' . $row['term_num'] . '</p>
          </div>
        </div>
    
        <div id="line"></div>';
      }
    }
