<?php
include('../../../Route/route_admin.php');
include('../conn.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Test</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="editprofile.css">

</head>
<body>

	<div id="wrapper">
    <div class="container bootstrap snippets bootdey">
            <div class="row justify-content-center">
              <!-- left column -->
              <div class="row justify-content-center g-0 col-md-5 mt-5 ">
                <div class="profile-pic-div">
                    <img src="../img/test.jpg" id="photo">
                    <input type="file" id="file">
                    <label for="file" id="uploadBtn">Choose Photo</label>
                </div>
              </div>
              
              
              <!-- edit form column -->
              <div class="col-7 personal-info">
                <h1>Edit Profile</h1>              
                  <form class="form-horizontal" role="form" action="" method="post">
                        <div class="form-group">
                          <div class="row">
                                <div class="col-md-5 mt-3">
                                First name :
                                <input class="fname short-input" name="fname" type="text" required>
                                </div>
                                <div class="col-md-5 mt-3">
                                Last name :
                                <input class="lname short-input" name="lname" type="text" required>
                                </div>
                          </div>
                          <div class="group-button mt-5">
                            <button type="submit" name="save" id="save">Save</button>
                            <a href="../firstpage.html"><button type="button" name="back" id="back">Back</button></a>
                          </div>
                        </div>  
                  </form>
                </div>
            </div>
    </div>

  </div>

  <script src="editprofile.js"></script>   
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>