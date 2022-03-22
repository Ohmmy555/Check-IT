<?php
<<<<<<< Updated upstream
//include('../../Route/route_admin.php');
//include('./conn.php');
include('../../Databast/database.php');
=======
// include('../../Route/route_admin.php');
// include('./conn.php');
>>>>>>> Stashed changes
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>First Page</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/0fb7422e9d.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="">
  <link rel="stylesheet" href="firstpage.css">
</head>

<body>

  <div class="sidenav">
    <div class="logo">
      <img src="img/logo.png" alt="logo" style="width:110px">
      <h2>check it</h2>
    </div>

    <div id="nav">
      <li><a href="firstpage.html">หน้าแรก</a></li>

      <li class="dropdown-btn">วิชา
        <i class="fa fa-caret-down"></i>
      </li>
      <ul class="dropdown-container">
        <li><a href="#">Link 1</a></li>
        <li><a href="#">Link 2</a></li>
        <li><a href="#">Link 3</a></li>
      </ul>
      <li class="dropdown-btn">เช็คชื่อ
        <i class="fa fa-caret-down"></i>
      </li>
      <ul class="dropdown-container">
        <a href="#">Link 1</a>
        <a href="#">Link 2</a>
        <a href="#">Link 3</a>
      </ul>
      <li class="dropdown-btn">คะแนน
        <i class="fa fa-caret-down"></i>
      </li>
      <ul class="dropdown-container">
        <a href="#">Link 1</a>
        <a href="#">Link 2</a>
        <a href="#">Link 3</a>
      </ul>
      <li><a id="delete" href="#">ลบวิชา</a></li>
    </div>
  </div>


  <div class="action">
    <div class="profile" onclick="menuToggle();">
      <img src="/img/test.jpg" alt="profile-pic" class="profile-pic">
    </div>
    <div class="menu">
      <img src="/img/test.jpg" alt="profile-pic" class="profile-pic" style="width:180px;">
      <h3 class="username">พิชามล บุญศรี</h3>
      <a href="./editprofile/editprofile.html" id="edit">Edit Profile</a><br>
      <a href="../../log-out/logout.php"><button class="sign-out" type="button">Sign out</button></a>
    </div>

  </div>


  <div class="content">
    <div class="main">
      <h1>ยินดีต้อนรับ CHECK IT</h1>
      <div class="subject-btn">
        <div class="container">
          <a href="./create/create.php"><button class="add-subject" type="button">เพิ่มวิชา</button></a>
          <?php include('first_block_db.php'); ?>
        </div>
      </div>

      <div class="subject">
        <b>Latest Subject</b><br>
        <hr>
        <?php include('first_db.php'); ?>
      </div>

    </div>
  </div>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

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
      dropdown[i].addEventListener("click", function() {
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
      btns[i].addEventListener("click", function() {
        var current = document.getElementsByClassName("active");
        current[0].className = current[0].className.replace(" active", "");
        this.className += " active";
      });
    }
  </script>

  <!-- <a href="testproject/enroll/?id='subjectid'">www</a> -->
</body>

</html>