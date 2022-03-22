<?php
include('../Route/route_ta.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>open subject</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/0fb7422e9d.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="./css/nav.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Kanit&display=swap');

    * {
      margin: 0;
      padding: 0;
      font-family: kanit;
      color: #624DCE;

    }

    .content h2 {
      color: #624DCE;
      position: relative;
      left: 450px;
      top: 40px;
      font-size: 40px;
      width: 50%;
      font-weight: bold;

    }

    span {
      font-weight: bold;
    }

    .content1 p {
      position: relative;
      left: 550px;
      top: -80px;
      width: 50%;

    }

    .text img {
      width: 200px;
      position: relative;
      left: 250px;
      top: 100px;
    }

    .text1 {
      position: relative;

      top: 10px;
    }

    #line {
      border-bottom: #7f69eec0 2px solid;
      width: 50%;
      position: relative;
      left: 35em;
      margin-top: 10px;
      z-index: -999;

    }

    .roundpic {
      border-radius: 50%;
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


  <div class="content">
    <h2>เช็คชื่อ</h2>
    <?php
    include('../Databast/database.php');
    session_start();
    $stdid = $_SESSION['stdid'];
    $sql = "SELECT Subject.Subject_name,Teacher.Teacher_name,Term.year,Term.term_num,TA_has_Subject.section 
    FROM TA_has_Subject JOIN Subject_detail ON (TA_has_Subject.idSubject = Subject_detail.idSubject) 
    JOIN Subject ON (Subject_detail.idSubject = Subject.idSubject) 
    JOIN Teacher ON (Subject_detail.idTeacher = Teacher.idTeacher) 
    JOIN Term ON (Subject_detail.idTerm = Term.idTerm) 
    WHERE TA_has_Subject.idTA = '$stdid'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
      echo "<h1>ไม่มีวิชาที่เปิดสอน</h1>";
    } else {
      foreach ($result as $data) {
    ?>
    <a href="./subject-check.php?sub_id=<?php echo $data["idSubject"];?>&sub_term=<?php echo $data["term_num"];?>&sub_sec=<?php echo $data["section"];?>">
        <div class="detail1">
          <div class="text">
            <img class="roundpic" src="../img/logo.png" alt="pic">
          </div>
          <div class="content1">
            <p><span>วิชา : </span><?php echo $data["Subject_name"];  ?> </p>
            <p><span>ผู้สอน : </span><?php echo $data["Teacher_name"];  ?>  </p>
            <p><span>ปีการศึกษา : </span><?php echo $data["year"];  ?> &nbsp; <span>ภาคเรียน : </span><?php echo $data["term_num"];  ?> </p>
          </div>
        </div>
        </a>
        <div id="line"></div>
  </div>

<?php
      }
    }
?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
</script>

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

</body>

</html>