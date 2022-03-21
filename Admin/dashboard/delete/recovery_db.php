<?php 
include('../../../Databast/database.php');
$sql = "UPDATE Subject_detail SET delete_at='0000-00-00 00:00:00' WHERE  idSubject='".$_GET['idSubject']."'"."AND term_num='".$_GET['term_num']."'"."AND idyear='".$_GET['idyear']."'";
$query = mysqli_query($conn,$sql);
if ($query) {
    echo 
    "<script>
            alert('กู้ข้อมูลสำเร็จ');
            window.location.href='index.php';
    </script>";
} else {
    echo 
    "<script>
            alert('ไม่สามารถลบข้อมูลได้');
            window.location.href='index.php';
    </script>";
}
?>