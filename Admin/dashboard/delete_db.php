<?php 
include('conn.php');
date_default_timezone_set('Asia/Bangkok');
$c_date = date('Y-m-d H:i:s', time());
//echo $c_date;
$sql = "UPDATE Subject_detail SET delete_at='$c_date' WHERE product_id='".$_GET['id']."'";
$query = mysqli_query($conn,$sql);
if ($query) {
    echo 
    "<script>
            alert('ลบข้อมูลสำเร็จ');
            window.location.href='index.php';
    </script>";
} else {
    echo 
    "<script>
            alert('ไม่สามารถลบข้อมูลได้');
            window.location.href='index.php';
    </script>";
}
