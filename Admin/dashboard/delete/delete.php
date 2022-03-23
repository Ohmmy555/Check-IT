<?php
//include('../../../Route/route_admin.php');
//include('../conn.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>วิชาที่ลบ</title>
  <link rel="stylesheet" href="../popup.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/0fb7422e9d.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="../nav.css">
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

    }

    .roundpic {
      border-radius: 50%;
    }

    .date {
      color: red;
      font-size: 18px;
    }

    .btn1 {
      position: relative;
      left: 50rem;
      top: -2rem;
      width: 40%;
    }

    .cd-popup-container h2 {
      position: relative;
      top: 50px;
      color: rgb(255, 0, 0);
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
      <a href="firstpage.html">หน้าแรก</a>
      <li class="dropdown-btn">วิชา
        <i class="fa fa-caret-down"></i>
      </li>
      <ul class="dropdown-container">
        <li><a href="create.php">วิชาที่สร้าง</a></li>
        <li><a href="./opensubject.php">วิชาที่เปิด</a></li>
        <li><a href="./delete.php">วิชาที่ลบ</a></li>
      </ul>
      <li class="dropdown-btn">User
        <i class="fa fa-caret-down"></i>
      </li>
      <ul class="dropdown-container">
        <a href="../userAdmin/teacher.html">อาจารย์</a>
        <a href="../userAdmin/ta.html">ผู้ช่วยสอน</a>

      </ul>
    </div>
  </div>


  <div class="action">
    <div class="profile" onclick="menuToggle();">
      <img src="../img/test.jpg" alt="profile-pic" class="profile-pic">
    </div>
    <div class="menu">
      <img src="img/test.jpg" alt="profile-pic" class="profile-pic" style="width:180px;">
      <h3 class="username">พิชามล บุญศรี</h3>
      <a href="../editprofile/editprofile.php" id="edit">Edit Profile</a><br>
      <button class="../sign-out" type="button">Sign out</button>
    </div>

  </div>


  <div class="content">
    <h2>วิชาที่ลบ</h2>

    <?php
    include('delete_day_db.php');
    include('../../../Databast/database.php');
    $Admin = mysqli_query($conn, "SELECT idAdmin FROM Admin WHERE Admin_username='mamean888'");
    $rs = mysqli_fetch_array($Admin);
    $sql = "SELECT * FROM Subject JOIN Subject_detail ON(Subject.idSubject=Subject_detail.idSubject) JOIN Term ON(Subject_detail.idTerm=Term.idTerm) JOIN TA_has_Subject ON(Subject_detail.idSubject=TA_has_Subject.idSubject) JOIN TA ON(TA_has_Subject.idTA=TA.idTA) WHERE Subject_detail.idAdmin='$rs[0]' AND Subject_detail.delete_at='0000-00-00 00:00:00'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      while ($subj_delete = mysqli_fetch_assoc($result)) {
        $totalday = Calday($subj_delete['delete_at']);
        echo '<div class="detail1">

    <div class="text">
      <img class="roundpic" src="../img/E4eLarNVEAM7n4T.jfif" alt="pic">
    </div>
    <div class="content1">
      <p><span>วิชา :' . $subj_delete['Subject_name'] . '</p>
      <p><span>ผู้สอน : </span> ' . $subj_delete['TA_fname'] . ' ' . $subj_delete['TA_lname'] . '</p>
      <p><span>ปีการศึกษา : </span> ' . $subj_delete['year'] . ' &nbsp; <span>ภาคเรียน : </span>' . $subj_delete['term_num'] . '</p>
      <p class="date">' . $totalday . ' วัน</p>
    </div>

    <div class="btn1">
      <a href="recovery_db.php?idSubject="' . $subj_delete['idSubject'] . '"&year="' . $subj_delete['year'] . '"&term_num="' . $subj_delete['term_num'] . '" data-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> กู้คืน</a>
      <a href="#" data-toggle="modal" class="btn btn-danger cd-popup-trigger"><span class="glyphicon glyphicon-trash"></span> ลบวิชา</a>
    </div>
  </div>

  <div id="line"></div>
';
      }
    } else {
      echo "ไม่มีรายวิชาที่เคยลบ";
    }
    ?>
    <!-- <div class="detail1">

      <div class="text">
        <img class="roundpic" src="../img/E4eLarNVEAM7n4T.jfif" alt="pic">
      </div>
      <div class="content1">
        <p><span>วิชา :' . $subj_delete['Subject_name'] . '</p>
        <p><span>ผู้สอน : </span> ' . $subj_delete['TA_fname'].' ' . $subj_delete['TA_lname'] . '</p>
        <p><span>ปีการศึกษา : </span> ' . $subj_delete['idyear'] . ' &nbsp; <span>ภาคเรียน : </span>' . $subj_delete['term_num'] . '</p>
        <p class="date">'.$totalday.' วัน</p>
      </div>

      <div class="btn1">
        <a href="deleteroom.php?idSubject=<?php echo $subj_delete['idSubject']; ?>&idyear=<?php echo $subj_delete['idyear']; ?>&term_num=<?php echo $subj_delete['term_num']; ?>" data-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> กู้คืน</a>
        <a href="delete_real.php?idSubject=<?php echo $subj_delete['idSubject']; ?>&idyear=<?php echo $subj_delete['idyear']; ?>&term_num=<?php echo $subj_delete['term_num']; ?>" data-toggle="modal" class="btn btn-danger cd-popup-trigger"><span class="glyphicon glyphicon-trash"></span> ลบวิชา</a>
      </div>
    </div>

    <div id="line"></div> -->




    <!-- //ปิดแท็กcontent -->
  </div>


  <!-- <div class="cd-popup" role="alert">
    <div class="cd-popup-container">
      <h2>ยืนยันการลบวิชาหรือไม่</h2>
      <p>342233/2564 Database Analysis and Design </p>
      <ul class="cd-buttons">
        <li><a href="delete_real.php?idSubject="' . $subj_delete['idSubject'] . '"&idyear="' . $subj_delete['idyear'] . '"&term_num="' . $subj_delete['term_num'] . '"'>ยืนยัน</a></li>
        <li><a href="#0">ยกเลิก</a></li>
      </ul>
      <a href="#0" class="cd-popup-close img-replace">Close</a>
    </div>  cd-popup-container 
  </div> -->

<?php 
$sql = "SELECT * FROM Subject JOIN Subject_detail ON(Subject.idSubject=Subject_detail.idSubject) JOIN Term ON(Subject_detail.idTerm=Term.idTerm) JOIN TA_has_Subject ON(Subject_detail.idSubject=TA_has_Subject.idSubject) JOIN TA ON(TA_has_Subject.idTA=TA.idTA) WHERE Subject_detail.idAdmin='$rs[0]' AND Subject_detail.delete_at='0000-00-00 00:00:00'";
$result = mysqli_query($conn, $sql);
$subj_delete1 = mysqli_fetch_array($result);
echo '<div class="cd-popup" role="alert">
<div class="cd-popup-container">
  <h2>ยืนยันการลบวิชาหรือไม่</h2>
  <p>342233/2564 Database Analysis and Design </p>
  <ul class="cd-buttons">
    <li><a href="delete_real.php?idSubject="' . $subj_delete1['idSubject'] . '"&year="' . $subj_delete1['year'] . '"&term_num="' . $subj_delete1['term_num'] . '">ยืนยัน</a></li>
    <li><a href="#0">ยกเลิก</a></li>
  </ul>
  <a href="#0" class="cd-popup-close img-replace">Close</a>
</div> <!-- cd-popup-container -->
</div>';
?>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
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

    //ปอปอัพ
    jQuery(document).ready(function($) {
      //open popup
      $('.cd-popup-trigger').on('click', function(event) {
        event.preventDefault();
        $('.cd-popup').addClass('is-visible');
      });

      //close popup
      $('.cd-popup').on('click', function(event) {
        if ($(event.target).is('.cd-popup-close') || $(event.target).is('.cd-popup')) {
          event.preventDefault();
          $(this).removeClass('is-visible');
        }
      });
      //close popup when clicking the esc keyboard button
      $(document).keyup(function(event) {
        if (event.which == '27') {
          $('.cd-popup').removeClass('is-visible');
        }
      });
    });
  </script>

</body>

</html>