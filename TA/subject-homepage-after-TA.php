<?php
include('../Route/route_ta.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CHECK IT</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/0fb7422e9d.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="./css/nav-TA-fixed.css">
  <link rel="stylesheet" href="./css/subject-homepage-after-TA.css">
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
include('../Databast/database.php');
session_start();
$stdid = $_SESSION['stdid'];
$sub_id = $_GET['sub_id'];
$sql = "SELECT Subject.Subject_name,Teacher.Teacher_name,Term.year,Term.term_num,Subject.Subject_description 
FROM TA_has_Subject JOIN Subject_detail ON (TA_has_Subject.idSubject = Subject_detail.idSubject) 
JOIN Subject ON (Subject_detail.idSubject = Subject.idSubject) 
JOIN Teacher ON (Subject_detail.idTeacher = Teacher.idTeacher) 
JOIN Term ON (Subject_detail.idTerm = Term.idTerm) 
WHERE TA_has_Subject.idTA = '$stdid' AND TA_has_Subject.idSubject = '$sub_id'";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($result);
?>


  <div class="content">
    <div class="main">
      <h1><?php echo $data["Subject_name"];  ?></h1>
    </div>
    <div id="profile-detail">
      <div class="profile-pic-div">
        <img src="../img/test.jpg" id="photo">
        <input type="file" id="file">
        <label for="file" id="uploadBtn">Choose Photo</label>
      </div>
      <div id="subject-detail">
        <p class="detail" name="subject-name"><span class="bold">วิชา :</span> <?php echo $data["Subject_name"];  ?></p>
          <p class="detail" name="code-subject-name"><span class="bold">รหัสวิชา :</span> <?php echo $sub_id ?></p>
        <p class="detail" name="teacher-name"><span class="bold">ผู้สอน :</span> <?php echo $data["Teacher_name"];  ?></p>
        <p class="detail" name="study-year"><span class="bold">ปีการศึกษา :</span> <?php echo $data["year"];  ?></p>
        <p class="detail" name="semi-study-year"><span class="bold">ภาคเรียน :</span> <?php echo $data["term_num"];  ?></p>
      </div>
      <div id="side-box">
        <div id="all-link-boxs">
          <div class="link-boxs">
            <a href="./ta_std.php?sub_id=<?php echo $sub_id ?>&sub_term=<?php echo $data["term_num"];?>&sub_sec=<?php echo $data["section"];?>&sub_name<?php echo $data["Subject_name"];  ?>" class="side-link">
              <p id="student-box"><span class="small">รายชื่อ </span><br> นักศึกษา </p>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div id="description-of-subject">
      <b id="description-bold">คำอธิบายรายวิชา :</b><p id="sub-description">
      <?php echo $data["Subject_description"];  ?> 
      </p>
    </div>

  </div>
</div>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
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
  </script>
  <script src="editprofile.js"></script>
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
</body>
<!-- <a href="testproject/enroll/?id='subjectid'">www</a> -->
</body>

</html>