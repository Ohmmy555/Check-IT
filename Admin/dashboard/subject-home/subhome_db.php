<?php 
// หยุดก่อน

include('../../../Databast/database.php');
$Subject_name = $GET_['Subject_name'];
$sql = "SELECT * FROM Subject JOIN Subject_detail ON(Subject.idSubject=Subject_detail.idSubject) 
JOIN Term ON(Subject_detail.idTerm=Term.idTerm) 
JOIN TA_has_Subject ON(Subject_detail.idSubject=TA_has_Subject.idSubject) 
JOIN TA ON(TA_has_Subject.idTA=TA.idTA) 
JOIN Enroll ON(Subject_detail.idSubject=Enroll.idSubject) 
JOIN Student ON(Enroll.idStudent=Student.idStudent) WHERE Subject_detail.idAdmin='$rs[0]' AND Subject_detail.Subject_name='$Subject_name'";
$result = mysqli_query($conn, $sql);
$num_rows = mysqli_num_rows($result);
$all = mysqli_fetch_array($result);
echo '<div class="main">
<h1> '.$Subject_name.' </h1>
</div>
<div id="profile-detail">
<div class="profile-pic-div">
  <img src="pic/test.jpg" id="photo">
  <input type="file" id="file">
  <label for="file" id="uploadBtn">Choose Photo</label>
</div>
<div>
  <p><span>วิชา :</span> '.$all['Subject_name'].'</p>
  <p><span>ผู้สอน :</span> '.$all['TA_username'].'</p>
  <p><span>ปีการศึกษา :</span>'.$all['year'].'</p>
  <p><span>ภาคเรียน :</span> '.$all['term_num'].'</p>
</div>
<div>
  <div>
    <p>นักศึกษาทั้งหมด</p>
    <div>
      <p>'.$all['idSection'].'</p>
      <p>'.$num_rows .'คน</p>
    </div>
  </div>
';
?>