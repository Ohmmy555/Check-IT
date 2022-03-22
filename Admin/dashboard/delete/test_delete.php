<?php
    include('delete_day_db.php');
    include('../../../Databast/database.php');
    $Admin = mysqli_query($conn, "SELECT idAdmin FROM Admin WHERE Admin_username='mamean888'");
    $rs = mysqli_fetch_array($Admin);
    $sql = "SELECT * FROM Subject JOIN Subject_detail ON(Subject.idSubject=Subject_detail.idSubject) JOIN Term ON(Subject_detail.idTerm=Term.idTerm) JOIN TA_has_Subject ON(Subject_detail.idSubject=TA_has_Subject.idSubject) JOIN TA ON(TA_has_Subject.idTA=TA.idTA) WHERE Subject_detail.idAdmin='0000001' AND Subject_detail.delete_at<>'0000-00-00 00:00:00'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      while ($subj_delete = mysqli_fetch_assoc($result)) {
        $totalday = Calday($subj_delete['delete_at']);
        echo '<div class="detail1">

        <div class="text">
          <img class="roundpic" src="img/E4eLarNVEAM7n4T.jfif" alt="pic">
        </div>
        <div class="content1">
          <p><span>วิชา :' . $subj_delete['Subject_name'] . '</p>
          <p><span>ผู้สอน : </span> ' . $subj_delete['TA_fname'] . ' ' . $subj_delete['TA_lname'] . '</p>
          <p><span>ปีการศึกษา : </span> ' . $subj_delete['year'] . ' &nbsp; <span>ภาคเรียน : </span>' . $subj_delete['term_num'] . '</p>
          <p class="date">' . $totalday . ' วัน</p>
        </div>
  
        <div class="btn1">
          <a href="recovery_db.php?idSubject="' . $subj_delete['idSubject'] . '"&year="' . $subj_delete['year'] . '"&term_num="' . $subj_delete['term_num'] . '" data-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> กู้คืน</a>
          <a href="#" data-toggle="modal" class="btn btn-danger cd-popup-trigger"><span class="glyphicon glyphicon-trash"></span> ลบวิชา</a>
        </div>
      </div>
  
      <div id="line"></div>

      <div class="cd-popup" role="alert">
      <div class="cd-popup-container">
        <h2>ยืนยันการลบวิชาหรือไม่</h2>
        <p>342233/2564 Database Analysis and Design </p>
        <ul class="cd-buttons">
          <li><a href="delete_real.php?idSubject="' . $subj_delete['idSubject'] . '"&year="' . $subj_delete['year'] . '"&term_num="' . $subj_delete['term_num'] . '">ยืนยัน</a></li>
          <li><a href="#0">ยกเลิก</a></li>
        </ul>
        <a href="#0" class="cd-popup-close img-replace">Close</a>
      </div> <!-- cd-popup-container -->
    </div>';
      }
    } else {
      echo "ไม่มีรายวิชาที่เคยลบ";
    }
    ?>