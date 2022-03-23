<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>นักศึกษา</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/0fb7422e9d.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="./css/nav.css">
  <link rel="stylesheet" href="./css/popup.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Kanit&display=swap');

    * {
      margin: 0;
      padding: 0;
      font-family: kanit;


    }

    h3 {
      color: #624DCE;
      position: relative;
      left: 50px;
      top: 40px;
      font-size: 40px;
      width: 100%;
      font-weight: bold;
      z-index: -999;

    }

    .content {
      width: 55rem;
      height: 50rem;
      background-color: white;
      border: 1px solid white;
      border-radius: 20px;
      padding: 5px;
      color: #624DCE;
      z-index: -999;
    }

    .text {
      font-size: 22px;
      position: relative;
      left: -16rem;
      margin-top: 20px;
      color: #624DCE;
    }

    .add {
      border: 1px solid #1C7CF0;
      background-color: #1C7CF0;
      width: 200px;
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
      left: -16rem;
      margin: 20px;

    }

    .add p {
      color: white;
      font-size: 16px;
      margin: 5px;
      width: 150px;
    }

    .add img {
      width: 25px;
      margin-left: 16px;
    }

    .content {
      position: relative;
      left: 350px;
      top: 60px;
      z-index: -999;
    }

    .number {
      position: relative;
      left: -16rem;
      margin: 20px;
      color: black;
      margin-top: 50px;
    }

    .excel {
      position: relative;
      left: 17rem;
      top: -2.5rem;
      color: black;
    }

    tr {
     border: 1px solid;

    }

    table {
      position: relative;
      left: 1.5rem;
      top: -46rem;
      color: black;

    }


    table th, table td {
      padding: 10px 45px 10px 45px;
    }

    .cd-popup-trigger {
      display: block;
      line-height: 20px;
    }
    

    .cd-popup-container h2 ,.add-popup-container h2,.edit-popup-container h2{
      position: relative;
      top: 40px;
      color: rgb(255, 0, 0);
    }

    .btn {
      width: 50px;
      position: relative;
      left: -1rem;
      border-radius: 3px;

    }
    .add-popup p,.edit-popup p{
      margin: 30px;
      text-align: left;
    
    }
    .btn1,.btn2{
        padding: 0px;
        margin: 0;
        

    }
    .btn1{
      position: relative;
      left: 2.5rem;
    

    }
    .btn2{
      position: relative;
      left: -3rem;

    }
    .namepopup{
        position: relative;
        top: -1.9rem;
        left: 12rem;
    }
    .add-popup-container p ,.edit-popup p{
     padding: 0; 
}
.id{
    position: relative;
        top: 3rem;
        left: 1rem;
}
  </style>

</head>

<body>

  <div class="sidenav">
    <div class="logo">
      <img src="../img/logo.png" alt="Avatar" style="width:110px">
      <h2>check it</h2>
    </div>

    <div id="nav">
      <a href="./firstpage.php">หน้าแรก</a>
      <a href="./opensubTA.php">วิชา</a>
      <a href="./opensub-check.php">เช็คชื่อ</a>
      <a href="ta_std.html">นักศึกษา</a>

    </div>
  </div>


<div class="action">
  <div class="profile" onclick="menuToggle();">
    <img src="../img/test.jpg" alt="profile-pic" class="profile-pic">
  </div>  
  <div class="menu">
    <img src="../img/test.jpg" alt="profile-pic" class="profile-pic" style="width:180px;"> 
    <h3 class="username"><?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?></h3>
      <a href="./editprofile/editprofile.html" id="edit">Edit Profile</a><br>
    <a href="./log-out/logout.php"><button class="sign-out" type="button">Sign out</button></a>
  </div>
  
</div>


<?php
$sub_id = $_GET['sub_id'];
$sub_term = $_GET['sub_term'];
$sub_sec = $_GET['sub_sec'];
$sub_name = $_GET['sub_name'];

?>

  <h3><?php echo $sub_id."/".$sub_term." ".$sub_name;  ?></h3>
  <div class="content">
    <p class="text">รายชื่อนักศึกษา</p>
    <?php include('roomaction.php'); ?>

    <table>
      <thead>
        <th>เลขที่</th>
        <th>รหัสนักศึกษา</th>
        <th>ชื่อ-นามสกุล</th>
        <th>Section</th>
      </thead>
      <tbody>
        <?php
            include('../Databast/database.php');
            $sql1 = "SELECT Student.Student_name,Student.idStudent,Enroll.idSection FROM Enroll JOIN Student ON (Enroll.idStudent=Student.idStudent) WHERE Enroll.idSubject = '$sub_id' AND Enroll.idTerm = $sub_term AND Enroll.idSection = $sub_sec";
                $result = mysqli_query($conn, $sql1);
              $num = 1;
              $row=mysqli_fetch_array($result);
            foreach($row as $data){
              ?>
        <tr>
            <td><?php echo $num; ?></td>
          <td><?php echo $data['idStudent']; ?></td>
          <td><?php echo $data['Student_name']; ?></td>
          <td><?php echo $data['idSection']; ?></td>
        </tr>
        <?php
        $num = $num + 1;
            }
          ?>
      </tbody>
    </table>

  </div>

  </div>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
  </script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="./script.js"></script>

  <!-- Part Java Script -->
  <script>
    /* action profile */
    function menuToggle() {
      const toggleMenu = document.querySelector('.menu');
      toggleMenu.classList.toggle('active')
    }



    /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
      dropdown[i].addEventListener("click", function () {
        this.classList.toggle("active");
        var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === "block") {
          dropdownContent.style.display = "none";
        } else {
          dropdownContent.style.display = "block";
        }
      });
    }

    // Add active class to the current button (highlight it)
    var header = document.getElementById("nav");
    var btns = header.getElementsByClassName("btn");
    for (var i = 0; i < btns.length; i++) {
      btns[i].addEventListener("click", function () {
        var current = document.getElementsByClassName("active");
        current[0].className = current[0].className.replace(" active", "");
        this.className += " active";
      });
    }


    //ปอปอัพลบ
    jQuery(document).ready(function ($) {
      //open popup
      $('.cd-popup-trigger').on('click', function (event) {
        event.preventDefault();
        $('.cd-popup').addClass('is-visible');
      });

      //close popup
      $('.cd-popup').on('click', function (event) {
        if ($(event.target).is('.cd-popup-close') || $(event.target).is('.cd-popup')) {
          event.preventDefault();
          $(this).removeClass('is-visible');
        }
      });
      //close popup when clicking the esc keyboard button
      $(document).keyup(function (event) {
        if (event.which == '27') {
          $('.cd-popup').removeClass('is-visible');
        }
      });
    });

    //ปอปอัพเพิ่มมมมม
    jQuery(document).ready(function ($) {
      //open popup
      $('.add-popup-trigger').on('click', function (event) {
        event.preventDefault();
        $('.add-popup').addClass('is-visible');
      });

      //close popup
      $('.add-popup').on('click', function (event) {
        if ($(event.target).is('.cd-popup-close') || $(event.target).is('.add-popup')) {
          event.preventDefault();
          $(this).removeClass('is-visible');
        }
      });
      //close popup when clicking the esc keyboard button
      $(document).keyup(function (event) {
        if (event.which == '27') {
          $('.add-popup').removeClass('is-visible');
        }
      });
    });

     //ปอปอัพแก้ไข
     jQuery(document).ready(function ($) {
      //open popup
      $('.edit-popup-trigger').on('click', function (event) {
        event.preventDefault();
        $('.edit-popup').addClass('is-visible');
      });

      //close popup
      $('.edit-popup').on('click', function (event) {
        if ($(event.target).is('.cd-popup-close') || $(event.target).is('.edit-popup')) {
          event.preventDefault();
          $(this).removeClass('is-visible');
        }
      });
      //close popup when clicking the esc keyboard button
      $(document).keyup(function (event) {
        if (event.which == '27') {
          $('.edit-popup').removeClass('is-visible');
        }
      });
    });
  </script>

</body>

</html>