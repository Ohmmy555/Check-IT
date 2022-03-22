<?php
session_start();

include('../Databast/database.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>เช็กชื่อ</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/0fb7422e9d.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="./css/nav-TA-fixed.css">
  <link rel="stylesheet" href="./css/subject-check.css">
  <link rel="stylesheet" href="./css/editprofile.js">
  <link rel="stylesheet" href="./css/popup-TA-fixed.css">

</head>

<body>

  <div class="sidenav">
    <div class="logo">
      <img src="/img/logo.png" alt="Avatar" style="width:110px">
      <h2>check it</h2>
    </div>

    <div id="nav">
      <a href="firstpage.html">หน้าแรก</a>
      <a href="firstpage.html">วิชา</a>
      <a href="firstpage.html">เช็คชื่อ</a>
      <a href="ta_std.html">นักศึกษา</a>

    </div>

  </div>


  <div class="action">
    <div class="profile" onclick="menuToggle();">
      <img src="/img/test.jpg" alt="profile-pic" class="profile-pic">
    </div>
    <div class="menu">
      <img src="/img/test.jpg" alt="profile-pic" class="profile-pic" style="width:180px;">
      <h3 class="username">พิชามล บุญศรี</h3>
      <a href="#" id="edit">Edit Profile</a><br>
      <button class="sign-out" type="button">Sign out</button>
    </div>

  </div>

  <div class="content">
    <div class="main">
      <h1> เช็คชื่อ </h1>
    </div>
    <div id="top-bar">
      <form action="../TA/test.php" method="post">
      <input type="date" id="calender" name="date"> <input type="text" id="search" name="stdid" placeholder="รหัสนักศึกษา"> <input type="submit" src="/img/loupe.png">
      </form>
    </div>
    <div id="next-bar">
      <a id="show" href="#">show</a> <a href="#" id="excel"><img src="/img/excel.png" class="icon" alt="excel icon"></a>
    </div>
    <div id="table-check">
      <form action="" method="get">
        <table>
          <tr>
            <td>เลขที่</td>
            <td id="student-number">รหัสนักศึกษา</td>
            <td id="name">ชื่อ-นามสกุล</td>
            <td class="calls">มา</td>
            <td class="calls">สาย</td>
            <td class="calls">ขาด</td>
            <td class="calls">ลา</td>
          </tr>

          <?php

          $sub_id = 342233;
          $sub_term = 1;
          $sub_sec = 1;

          echo $date = $_POST['data'];
          //
          if(isset($_POST['data'])){
            $date = $_POST['data'];
          $sql2 = "SELECT check_day FROM Check WHERE check_day = '$date'";
          $result = mysqli_query($conn, $sql2);
          $num1 = 1;
          if(mysqli_num_rows($result) > 0){
            $sql3 = "SELECT Student.Student_name,Check.idStudent,Check.status FROM Enroll JOIN Student ON (Enroll.idStudent=Student.idStudent)
            JOIN Check ON (Enroll.idStudent=Check.idStudent) WHERE check_day = '$date'";
            $result = mysqli_query($conn, $sql3);
            ?>
          <tr>
            <td><?php echo $num; ?></td>
            <td><?php echo $data['idStudent']; ?></td>
            <td><?php echo $data['Student_name']; ?></td>
            <td><input type="radio" name="checked[]" id="present"></td>
            <td><input type="radio" name="checked[]" id="late"></td>
            <td><input type="radio" name="checked[]" id="absent"></td>
            <td><input type="radio" name="checked[]" id="leave"></td>
          </tr>
          <?php $num1 = $num1 + 1; ?>
<?php
            }
          }

          /*$sql1 = "SELECT Student.Student_name,Student.idStudent FROM Enroll JOIN Student ON (Enroll.idStudent=Student.idStudent)
        WHERE Enroll.idSubject = '$sub_id' AND Enroll.idTerm = $sub_term AND Enroll.idSection = $sub_sec";
            $result = mysqli_query($conn, $sql1);
            $num = 1;
            foreach($result as $data){
          ?>
          <tr>
            <td><?php echo $num; ?></td>
            <td><?php echo $data['idStudent']; ?></td>
            <td><?php echo $data['Student_name']; ?></td>
            <td><input type="radio" name="checked[]" id="present"></td>
            <td><input type="radio" name="checked[]" id="late"></td>
            <td><input type="radio" name="checked[]" id="absent"></td>
            <td><input type="radio" name="checked[]" id="leave"></td>
          </tr>*/
         //<?php $num = $num + 1; ?>
<?php
          //  }
         // }

?>

          
        </table>
      
      <div id="botton-save">
        <input type="submit" name="save" id="save" value="Save">
      </div>
      </form>
    </div>


  </div>
  </div>


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
  <script src="editprofile.js"></script>
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
<!-- <a href="testproject/enroll/?id='subjectid'">www</a> -->
</body>
</html>