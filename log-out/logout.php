<?php
session_start();
session_destroy();
$_SESSION = array();
$username = $_COOKIE[$cookie_username];
$password_1 = $_COOKIE[$cookie_password];
setcookie($username, null, -1, '/');
setcookie($password_1, null, -1, '/');
echo "<script>alert('"."ออกจากระบบเรียบร้อย"."')</script>";
echo "<script>location.replace('./main.php');</script>";
?>