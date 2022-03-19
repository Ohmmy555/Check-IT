<?php
session_start();
ob_start();
include('server.php');
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password_1 = mysqli_real_escape_string($conn, $_POST['password']);

if ($_COOKIE['cookie_user'] != "") {
  $user_unseria = unserialize($_COOKIE["cookie_user"]);
  $username = $user_unseria["username"];
  $password_1 = $user_unseria["password"];
}

$password = md5($password_1);
$sql = "SELECT * FROM ta WHERE username = '$username' AND password = '$password' ";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 1) {
  $_SESSION['username']=$username;
  echo "<script>location.replace('./index.php');</script>";

  //Cookies
  if ($_POST['remember'] == 'remember') {
    $user_seria = ['username' => $username, 'password' => $password_1];
    $user_seria = serialize($user);
    setcookie("cookie_user", $user_seria, time() + (86400 * 30), "/"); // 86400 = 1 day
  }
} else {
  $_SESSION['error_login'] = "Wrong username or password try again";
  echo "<script>location.replace('./login.php');</script>";
}

ob_end_flush();
