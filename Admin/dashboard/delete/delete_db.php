<!-- ลบทิพย์กู้ได้ -->
<?php 
include('conn.php');
date_default_timezone_set('Asia/Bangkok');
$c_date = date('Y-m-d H:i:s', time());
//echo $c_date;
$sql = "UPDATE Subject_detail SET delete_at='$c_date' WHERE  idSubject='".$_GET['idSubject']."'"."AND term_num='".$_GET['term_num']."'"."AND idyear='".$_GET['idyear']."'";
$query = mysqli_query($conn,$sql);
if ($query) {
    echo 
    "<script>
            alert('ลบข้อมูลสำเร็จ');
            window.location.href='delete.php';
    </script>";
} else {
    echo 
    "<script>
            alert('ไม่สามารถลบข้อมูลได้');
            window.location.href='delete.php';
    </script>";
}
?>