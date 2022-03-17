<?php 
session_start();
include('server.php');

$_SESSION['error_login'] = "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check IT Register</title>
    <link rel="stylesheet" href="css/register.css">
</head>

<body>
    <div id="header-bar">
        <a href="../main.php"><h1>Check IT</h1></a>
        <div id="login-bar">
            <div class="menu-login">
                <a href="">
                    <p id="login-bt">Login</p>
                </a>
            </div>
            <div class="menu-login">
                <a href="">
                    <p id="sign-up-bt">Sign Up</p>
                </a>
            </div>
        </div>
    </div>
    <div>
        <h2>Sign Up</h2>
        <form action="register_db.php" method="POST">
            <?php include('errors.php')?>
            <?php
            session_start();
                if($_SESSION['error_signin']!=""){
                    echo '<p>'. $_SESSION["error_signin"].' </p>';
                }
            ?>
            <div id="text-card">
                <div id="one-inside-card">
                    <p class="p">First name</p>
                    <input class="short-input" name="fname" type="text" required>
                </div>
                <div id="two-inside-card">
                    <p class="p">Last name</p>
                    <input class="short-input" name="lname" type="text" required>
                </div>
            </div>
            <div class="text-mini-card">
                <p class="p">Username</p>
                <input class="long-input" name="username" type="text" required>
            </div>
            <div class="text-mini-card">
                <p class="p">ID Student</p>
                <input class="long-input" name="id-student-ta" type="text" required>
            </div>

            <div class="text-mini-card">
                <p class="p">Password</p>
                <input class="long-input" name="password_1" type="password" required>
            </div>

            <div class="text-mini-card">
                <p class="p">Confirm Password</p>
                <input class="long-input" name="password_2" type="password" required>
            </div>
            <button type="submit" name="login" id="submit">Submit</button>
            <p id="already"> Already have an account? <a href="../log-in/login.php" style="text-decoration: underline;"> Login</a></p>
        </form>
        
    </div>
    <div>
        <div id="login-picture">
            <img src="./picture/pic/search-login.jpg" alt="รูปปุ่มเสิร์ท" class="search-icon">
        </div>
    </div>
</body>

</html>