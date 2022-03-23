<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <link rel="shortcut icon" type="image/x-icon" href="./HCI.png">
    <title>HCI Check Name</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;

            }
        }
        .black{
            background-color: rgba(255, 255, 255, 0.7);
            border-radius: 10px;
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
</head>

<body class="text-center">
<?php
            $t = time();
            date_default_timezone_set('Asia/Bangkok');
            ?>
<?php
session_status();
include('connecteddb.php');
include('connecteddb_list.php');

$errors = array();

    $fullName = mysqli_real_escape_string($conn, $_POST['name']);
    $stdid = mysqli_real_escape_string($conn, $_POST['stdID']);
    $sec = mysqli_real_escape_string($conn, $_POST['section']);
    $ip = date("Y-m-d H:i", $t);
    $sqli = "SELECT * FROM $sec";
    $result1 = mysqli_query($conn, $sqli);
    $result2 = mysqli_query($conn2, $sqli);
    while($rs1 = mysqli_fetch_array($result2)){
        if($rs1['stdid']==$stdid){
            $num = 1;
            while($rs2 = mysqli_fetch_array($result1)){
                if($rs2['stdid']==$stdid){
                    $sum = 1;
                    break;
                }else{
                    $sum = 2;
                }
            }
            break;
        }else{
            $num = 2;
        }
    }
        if($num==1 and $sum!=1){
            $sql = "INSERT INTO $sec(name, stdid) VALUES ('$fullName', '$stdid')";
            mysqli_query($conn, $sql);
            mysqli_close($conn);
        }elseif($sum==1){
            echo "<script>alert('".$fullName." ได้เช็คชื่อไปแล้ว!!"."')</script>";
            echo "<script>location.replace('index.php');</script>";
        }elseif($num==2){
            echo "<script>alert('".$fullName." ไม่มีในฐานข้อมูลของSectionนี้!! ให้เช็คชื่ออีกครั้ง หรือติดต่อพี่ TA"."')</script>";
            echo "<script>location.replace('index.php');</script>";
        }
?>

<main class="form-signin black">
        <form method="post" action="">
            <img class="mb-1" src="./HCI.png" alt="" width="90">
            <h1 class="h3 mb-3 fw-normal">HCI Check Name</h1>
            <div id="liveAlertPlaceholder"></div>
            <img src="./pngegg.png" alt="" style="width: 60px;margin-bottom:10px;">
            <div class="alert alert-success" role="alert">
                เช็คชื่อเรียบร้อย
            </div>

            <table style="margin: auto;font-size: .9rem;">
                <tr>
                    <td style="text-align:start;">ชื่อ-นามสกุล :</td>
                    <td><?php echo $_POST['name'] ?></td>
                </tr>
                <tr>
                    <td style="text-align:start;">รหัสนักศึกษา :</td>
                    <td><?php echo $_POST['stdID'] ?></td>
                </tr>
                <tr>
                    <td style="text-align:start;">Section :</td>
                    <td><?php echo $_POST['section'] ?></td>
                </tr>
                <tr>
                    <td style="text-align:start;">เวลาเช็คชื่อ :</td>
                    <td><?php echo date("Y-m-d H:i", $t) ?></td>
                </tr>
            </table>
        </form>
        <br>
        <footer>
            <p style="font-size: 13px; font-weight: 200; text-align: center;" class="text-muted">©2021 HCI-check V.7 ALL
                RIGHTS RESERVED. DESIGN BY SUPPHITAN PAKSAWAD
        </footer>
    </main>

    
</body>

</html>