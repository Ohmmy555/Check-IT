<?php
session_start();
if(empty($_SESSION['Admin_username'])){
    echo "<script>alert('"."คุณยังไม่เข้าสู่ระบบ!!!"."')</script>";
    echo "<script>location.replace('../log-in/login.php');</script>";
}
if(isset($_COOKIE[['cookie_admin']])){
    echo "<script>location.replace('../log-in/login_db.php');</script>";
} 

?>