<?php
include('../Route/route_ta.php');
include('../Databast/database.php');
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

  <link rel="stylesheet" href="./css/firstpage.css">
</head>

<body>

  <div class="sidenav">
    <div class="logo">
      <img src="../img/logo.png" alt="logo" style="width:110px">
      <h2>check it</h2>
    </div>

    <div id="nav">
      <a href="./firstpage.php">หน้าแรก</a>
      <a href="./opensubTA.php">วิชา</a>
      <a href="./opensub-check.php">เช็คชื่อ</a>

    </div>

  </div>


  <div class="action">
    <div class="profile" onclick="menuToggle();">
      <img src="../img/test.jpg" alt="profile-pic" class="profile-pic">
    </div>
    <div class="menu">
      <img src="../img/test.jpg" alt="profile-pic" class="profile-pic" style="width:180px;">
      <h3 class="username"><?php echo $_SESSION['fname'] . " " . $_SESSION['lname']; ?></h3>
      <a href="./editprofile/editprofile.html" id="edit">Edit Profile</a><br>
      <a href="./log-out/logout.php"><button class="sign-out" type="button">Sign out</button></a>
    </div>

  </div>


  <div class="content">
    <div class="main">
      <h1>ยินดีต้อนรับ CHECK IT</h1>


      <div class="subject">
        <b>Latest Subject</b><br>
        <hr>
        <?php

        //Database SQL
        $stdid = $_SESSION['stdid'];
        $sql = "SELECT Subject.Subject_name,TA_has_Subject.idSection,TA_has_Subject.idSubject 
    FROM TA_has_Subject JOIN Subject_detail ON (TA_has_Subject.idSubject = Subject_detail.idSubject) 
    JOIN Subject ON (Subject_detail.idSubject = Subject.idSubject) 
    WHERE TA_has_Subject.idTA = '$stdid'";
        $result = mysqli_query($conn, $sql);
        foreach ($result as $data) {
        ?>
          <p>
            <a href="./subject-homepage-after-TA.php?sub_id=<?php echo $data["idSubject"]; ?>"><i class="fa fa-solid fa-folder" style="float: left;"></i><?php echo $data['Subject_name'] . " " . $data['idSection']; ?></a>
            <a href="#"><i class="fa fa-solid fa-trash"></i></a>
            <a href="#"><i class="fa fa-light fa-pen"></i></a>
          </p>
          <hr>
        <?php
        }
        ?>
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