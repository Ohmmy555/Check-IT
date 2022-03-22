<?php
session_start();
$username = $_SESSION['stdid'];
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/0fb7422e9d.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="./css/nav-TA-fixed.css">
  <link rel="stylesheet" href="./css/subject-check.css">
  <link rel="stylesheet" href="./css/editprofile.js">
  <link rel="stylesheet" href="./css/popup-TA-fixed.css">

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
    <div class="main">
      <h1> เช็คชื่อ </h1>
    </div>
    <div id="top-bar">
      <form action="./subject-check.php" method="post">
      <input type="date" id="calender" name="date">  
      <button type="submit" id="bt-search-pic" name="sub_date">
        <img id="search-icon" src="../img/loupe.png" />
      </button>
      </form>
    </div>
    <div id="next-bar">
      <input type="text" id="date-now" placeholder="วันที่" value="<?php $_POST['date']?>" readonly><a id="show" href="#">show</a> <a href="#" id="excel"><img src="../img/excel.png" class="icon" alt="excel icon"></a>
    </div>
    <div id="table-check">
      <form action="./subject-check.php" method="POST">
        <table>
          <tr>
            <td>เลขที่</td>
            <td id="student-number">รหัสนักศึกษา</td>
            <td id="name">ชื่อ-นามสกุล</td>
            <td class="calls">มา</td>
            <td class="calls">สาย</td>
            <td class="calls">ลา</td>
            <td class="calls">ขาด</td>
          </tr>

          <?php
          /******************************************************** */
          $sub_id = $_GET['sub_id'];
          $sub_term = $_GET['sub_term'];
          $sub_sec = $_GET['sub_sec'];
          $date = $_POST['date'];
          if (isset($_POST['sub_date'])) {
            if (isset($_POST['date'])) {
              $sql2 = "SELECT Checked.idStudent,Student.Student_name,Checked.status FROM Enroll JOIN Checked ON (Enroll.idStudent=Checked.idStudent)
            JOIN Student ON (Enroll.idStudent=Student.idStudent) WHERE Checked.idSubject = '$sub_id'AND Checked.trem = '$sub_term' AND Checked.check_day = '$date' AND Checked.idSection = '$sub_sec'";
              $result = mysqli_query($conn, $sql2);
              $num1 = 1;
              if (mysqli_num_rows($result) > 0) {
                foreach ($result as $data) { ?>
                  <tr>
                    <td><?php echo $num1; ?></td>
                    <td><input type="text" id="calender" name="stdid[]" value="<?php echo $data['idStudent']; ?>" readonly></td>
                    <td><input type="text" id="calender" name="std_name" value="<?php echo $data['Student_name']; ?>" readonly></td>

                    <?php switch ($data['status']) {
                      case "1": ?>
                        <td><input type="radio" name='<?php echo $data['idStudent']; ?>[]' id="present" value="1" checked></td>
                        <td><input type="radio" name='<?php echo $data['idStudent']; ?>[]' id="late" value="2"></td>
                        <td><input type="radio" name='<?php echo $data['idStudent']; ?>[]' id="absent" value="3"></td>
                        <td><input type="radio" name='<?php echo $data['idStudent']; ?>[]' id="leave" value="4"></td>

                      <?php
                        break;
                      case "2":
                      ?>
                        <td><input type="radio" name='<?php echo $data['idStudent']; ?>[]' id="present" value="1"></td>
                        <td><input type="radio" name='<?php echo $data['idStudent']; ?>[]' id="late" value="2" checked></td>
                        <td><input type="radio" name='<?php echo $data['idStudent']; ?>[]' id="absent" value="3"></td>
                        <td><input type="radio" name='<?php echo $data['idStudent']; ?>[]' id="leave" value="4"></td>

                      <?php
                        break;
                      case "3":
                      ?>
                        <td><input type="radio" name='<?php echo $data['idStudent']; ?>[]' id="present" value="1"></td>
                        <td><input type="radio" name='<?php echo $data['idStudent']; ?>[]' id="late" value="2"></td>
                        <td><input type="radio" name='<?php echo $data['idStudent']; ?>[]' id="absent" value="3" checked></td>
                        <td><input type="radio" name='<?php echo $data['idStudent']; ?>[]' id="leave" value="4"></td>

                      <?php
                        break;
                      case "4":
                      ?>
                        <td><input type="radio" name='<?php echo $data['idStudent']; ?>[]' id="present" value="1"></td>
                        <td><input type="radio" name='<?php echo $data['idStudent']; ?>[]' id="late" value="2"></td>
                        <td><input type="radio" name='<?php echo $data['idStudent']; ?>[]' id="absent" value="3"></td>
                        <td><input type="radio" name='<?php echo $data['idStudent']; ?>[]' id="leave" value="4" checked></td>
                    <?php break;} ?>
                  </tr>
                <?php
                  $num1 = $num1 + 1;
                }
              } else {
                $sql1 = "SELECT Student.Student_name,Student.idStudent FROM Enroll JOIN Student ON (Enroll.idStudent=Student.idStudent)
          WHERE Enroll.idSubject = '$sub_id' AND Enroll.idTerm = $sub_term AND Enroll.idSection = $sub_sec";
                $result = mysqli_query($conn, $sql1);
                $num = 1;
                foreach ($result as $data) {
                ?>
                  <tr>

                    <td><?php echo $num; ?></td>
                    <td><input type="text" id="calender" name="stdid[]" value="<?php echo $data['idStudent']; ?>" readonly></td>
                    <td><input type="text" id="calender" name="std_name" value="<?php echo $data['Student_name']; ?>" readonly></td>
                    <td><input type="radio" name='<?php echo $data['idStudent']; ?>[]' id="present" value="1"></td>
                    <td><input type="radio" name='<?php echo $data['idStudent']; ?>[]' id="late" value="2"></td>
                    <td><input type="radio" name='<?php echo $data['idStudent']; ?>[]' id="absent" value="3"></td>
                    <td><input type="radio" name='<?php echo $data['idStudent']; ?>[]' id="leave" value="4" checked></td>
                  </tr>
          <?php $num = $num + 1;
                }
              }
            }
          }
          /******************************************************* */
          ?>
        </table>
        <div id="botton-save">
          <input type="submit" name="save" id="save" value="Save">
        </div>
      </form>
    </div>


  </div>
  </div>
</div>


  <?php
  if (isset($_POST['save'])) {
    $date = $_POST['date'];
    $sql2 = "SELECT Checked.idStudent,Student.Student_name,Checked.status FROM Enroll JOIN Checked ON (Enroll.idStudent=Checked.idStudent)
  JOIN Student ON (Enroll.idStudent=Student.idStudent) WHERE Checked.idSubject = '$sub_id'AND Checked.trem = '$sub_term' AND Checked.check_day = '$date' AND Checked.idSection = '$sub_sec'";
    $result = mysqli_query($conn, $sql2);
    if (mysqli_num_rows($result) > 0) {

      $data1 = $_POST['stdid'];
      foreach ($data1 as $pro) {
        foreach ($_POST[$pro] as $data2) {
          $sql3 = "UPDATE Checked SET status = '$data2' WHERE idSubject = '$sub_id' AND idStudent = '$pro' AND trem = '$sub_term' AND check_day = '$date' AND idSection = '$sub_sec'";
          mysqli_query($conn, $sql3);
        }
      }
    }
    if (mysqli_num_rows($result) == 0) {
      $t=time();
      $time=(date("Y-m-d",$t));
      $data1 = $_POST['stdid'];
      foreach ($data1 as $pro) {
        foreach ($_POST[$pro] as $data2) {
          $sql4 = "INSERT INTO Checked(status,idSubject,idTA,idSection,idStudent,trem,check_day) 
      VALUES ('$data2','$sub_id','$username',$sub_sec,'$pro',$sub_term,'$time')";
          mysqli_query($conn, $sql4);
        }
      }
    }
  }

  ?>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
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
  
  </script>
  <script src="editprofile.js"></script>
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
  <!-- <a href="testproject/enroll/?id='subjectid'">www</a> -->
</body>

</html>