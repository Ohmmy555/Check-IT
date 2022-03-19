<?php
session_start();
include('server.php');
include('register_check.php');
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


</head>

<body>
    <div id="header-bar">
        <a href="../main.php">
            <h1>Check IT</h1>
        </a>
        <div id="login-bar">
            <div class="menu-login">
                <a href="../../TA/log-in/login.php">
                    <p id="login-bt">Login</p>
                </a>
            </div>
            <div class="menu-login">
                <a href="#">
                    <p id="sign-up-bt">Sign Up</p>
                </a>
            </div>
        </div>
    </div>
    <div>
        <h2>Sign Up</h2>
        <form action="register_db.php" method="POST" id="user_form">
            <?php include('errors.php') ?>
            <?php
            session_start();
            if ($_SESSION['error_signin'] != "") {
                echo '<p>' . $_SESSION["error_signin"] . ' </p>';
            }
            ?>
            <div id="text-card">
                <div id="one-inside-card">
                    <p class="p">First name</p>
                    <input class="short-input" name="fname" type="text" required id="fname"><br>
                    <span id="massage_fname"></span>
                </div>
                <div id="two-inside-card">
                    <p class="p">Last name</p>
                    <input class="short-input" name="lname" type="text" required id="lname"><br>
                    <span id="massage_lname"></span>
                </div>
            </div>

                <div class="text-mini-card">
                    <p class="p">ID Student</p>
                    <input class="long-input" name="id-student-ta" type="text" required id='stdid'><br>
                    <span id="massage_stdid"></span>
                </div>

            <div class="text-mini-card">
                <p class="p">Username</p>
                <input class="long-input" name="username" type="text" required id="username"><br>
                <span id="massage_username"></span>
            </div>


            <div class="text-mini-card">
                <p class="p">Password</p>
                <input class="long-input" name="password_1" type="password" required id="password"><br>
                <span id="massage_password"></span>
            </div>

            <button type="submit" name="login" id="submit" class="btn-submit">Submit</button>
            <p id="already"> Already have an account? <a href="../../TA/log-in/login.php" style="text-decoration: underline;"> Login</a></p>
        </form>

    </div>
    <div>
        <div id="login-picture">
            <img src="./picture/pic/search-login.jpg" alt="รูปปุ่มเสิร์ท" class="search-icon">
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
    <script src="./js/check.js"></script>
</body>

</html>