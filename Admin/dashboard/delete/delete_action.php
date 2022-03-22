<?php
// include('../../../Databast/database.php');
// $sql = "SELECT * FROM Subject JOIN Subject_detail ON(Subject.idSubject=Subject_detail.idSubject) JOIN Term ON(Subject_detail.idTerm=Term.idTerm) JOIN TA_has_Subject ON(Subject_detail.idSubject=TA_has_Subject.idSubject) JOIN TA ON(TA_has_Subject.idTA=TA.idTA) WHERE Subject_detail.idAdmin='$rs[0]' AND Subject_detail.delete_at='0000-00-00 00:00:00'";
// $result = mysqli_query($conn, $sql);
// $subj_delete1 = mysqli_fetch_array($result);
// echo '<div class="cd-popup" id="del' . $subj_delete1['idSubject'] . '"role="alert">
// <div class="cd-popup-container">
//   <h2>ยืนยันการลบวิชาหรือไม่</h2>
//   <p>' . $subj_delete1['idSubject'] . '</p>
//   <ul class="cd-buttons">
//     <li><a href="delete_real.php?idSubject="' . $subj_delete1['idSubject'] . '"&year="' . $subj_delete1['year'] . '"&term_num="' . $subj_delete1['term_num'] . '">ยืนยัน</a></li>
//     <li><a href="#0">ยกเลิก</a></li>
//   </ul>
//   <a href="#0" class="cd-popup-close img-replace">Close</a>
// </div> <!-- cd-popup-container -->
// </div>';

?>

<div class="cd-popup" id="del'.$subj_delete['idSubject'].'" role="alert">
    <div class="cd-popup-container">
        <h2>ยืนยันการลบวิชาหรือไม่</h2>
        <?php
        $del = mysqli_query($conn, "SELECT * from Subject where idSubject='" . $subj_delete['idSubject']. "'");
        $drow = mysqli_fetch_array($del);
        ?>
        <p><?php echo $drow['Subject_name'];?></p>
        <ul class="cd-buttons">
            <li><a href="delete_real.php?idSubject='<?php echo $subj_delete['idSubject'];?>'">ยืนยัน</a></li>
    <li><a href="#0">ยกเลิก</a></li>
  </ul>
  <a href="#0" class="cd-popup-close img-replace">Close</a>
</div> <!-- cd-popup-container -->
</div>