<?php include('server.php');

session_start();
$_SESSION['error_login'] = "";
$_SESSION['error_signin'] = "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check IT</title>
    <link rel="stylesheet" href="./css/main.css">
    
</head>
<body>
    <div id="header-bar">
    <a href="/main.php"><h1>Check IT</h1></a>
        <div id="login-bar">
            <div class="menu-login">
                <a href="./Admin/log-in/login.php">
                    <img src="./picture/icon/user.png" alt="ไอคอนล็อคอิน" class="login-icon">
                    <p >Admin login</p>
                </a>
                
            </div>
            <div class="menu-login">
                <a href="./TA/log-in/login.php">
                    <img src="./picture/icon/user.png" alt="ไอคอนล็อคอิน" class="login-icon">
                    <p>TA login</p>
                </a>
                
            </div>
        </div>
    </div>

    <div id="paragraph">
        <div id="block-paragraph">
            <h2>Help Teaching assistants, and your students.</h2>
            <p>Web helper for an Teaching assistant’s include grading, attendance, and report.</p>
        </div>
        <div id="login-picture">
            <img src="./picture/pic/search-login.jpg" alt="รูปปุ่มเสิร์ท" class="search-icon">
        </div>
    </div>
</body>
</html>