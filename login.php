<?php
session_start(); 
include('server.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check IT Login</title>
    <link rel="stylesheet" href="/css/login.css">
   
</head>

<body>
    <div id="header-bar">
        <h1>Check IT</h1>
        <div id="login-bar">
            <div class="menu-login">
                <a href="login.php">
                    <p id="login-bt">Login</p>
                </a>
            </div>
            <div class="menu-login">
                <a href="register.php">
                    <p id="sign-up-bt">Sign Up</p>
                </a>
            </div>
        </div>
    </div>
    <div>
        <h2>Login</h2>
        <form  action="login_db.php" method="post">
            <input id="username" type="text" class="form-control" name="username" aria-describedby="username" placeholder="Username" required> <br>
            <input id="password" type="password" class="form-control" name="password" placeholder="Password" required> <br>
            <!-- ปุ่ม remember me ถ้าอยากใช้ต้องใช้การทำ cookie เข้ามาช่วย อันนี้ขอติดไว้ก่อน -->
            <input id="remember" type="checkbox" name="remember"  value="remember"> Remember me  <br>
            <button type="submit" name="login" id="login">Login</button>
            <p id="dont"> Don't have an account? <a href="register.php
                " style="text-decoration: underline;"> Sign Up</a></p>
        </form>

       
    </div>
    <div>
        <div id="login-picture">
            <img src="/picture/pic/search-login.jpg" alt="รูปปุ่มเสิร์ท" class="search-icon">
        </div>
    </div>

</body>

</html>