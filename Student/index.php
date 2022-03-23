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
        body{
            background-color:  #624DCE;
        }
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
            background-color: rgba(255, 255, 255, 0.89);
            border-radius: 10px;
        }
        .form-signin{
            background-color: #F9F9F9;
            color: #636363;
            border-radius: 1.5em;
            padding: 4%;
            width: 35rem;
            margin-left: 33%;
            margin-top: 1%;
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
</head>

<body class="text-center">

<!-- Messenger ปลั๊กอินแชท Code -->
<div id="fb-root"></div>

<!-- Your ปลั๊กอินแชท code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
  var chatbox = document.getElementById('fb-customer-chat');
  chatbox.setAttribute("page_id", "113135651271674");
  chatbox.setAttribute("attribution", "biz_inbox");
</script>

<!-- Your SDK code -->
<script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v12.0'
    });
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/th_TH/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>
    <main class="form-signin black">
        <form method="post" action="./Student/respond.php">
            <img class="mb-1" src="logo.png" width="160">
            <h1 class="h3 mb-3 fw-normal">Check Name</h1>
            <div id="liveAlertPlaceholder"></div>
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="123456789-0" name="stdID" required>
                <label for="floatingInput">รหัสนักศึกษา</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingPassword" placeholder="สุดใจ ยุพิน" name="name" required>
                <label for="floatingPassword">ชื่อ-นามสกุล</label>
            </div>
            <div style="margin: 10px 0;">
<?php
$idSubject = $_GET['subject'];
$idTerm = $_GET['trem'];
$teacher = $_GET['teacher'];
?>



            Section : <select name="section">
                <?php
                    include('../Databast/database.php');
                    $sql = "SELECT COUNT(idSection) FROM Subject_detail WHERE idSubject = '$idSubject' AND idTerm = $idTerm";
                    $re = mysqli_query($conn,$sql);
                    $numSection = mysqli_fetch_assoc($re);
                    foreach($numSection as $data){
                        echo "<option value='$data'>$data</option>";
                    }
                ?>
                </select>
                
            </div>
            <input type="hidden" name="trem" value="<?php $idTrem ?>">
            <input type="hidden" name="teacher" value="<?php $teacher ?>">
            <button class="w-100 btn btn-lg" style="background-color: #624DCE; color: #fff;" type="submit" id="liveAlertBtn" name="reg_user">Check!!</button>
        </form>
    </main>



</body>

</html>