<?php
session_start();
setcookie("cookie_user","", time() - 3600, "/");
$_SESSION = array();
session_destroy();
echo "<script>alert('"."ออกจากระบบเรียบร้อย"."')</script>";
echo "<script>location.replace('../../main.php');</script>";


?>