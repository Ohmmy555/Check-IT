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
    <div class="container">
          <div class="row justify-content-center">
              <!-- left column -->
              <div class="row justify-content-center g-0 col-md-5 mt-5">
                <div class="profile-pic-div">
<<<<<<< Updated upstream
                    <img src="/img/test.jpg" id="photo">
                    <input type="file" id="file">
=======
                    <img src="../img/ta.jpg" id="photo">
                    <input type="file" id="file" name="imgfile">
>>>>>>> Stashed changes
                    <label for="file" id="uploadBtn">Choose Photo</label>
                </div>
              </div>
              
              
              <!-- edit form column -->
              <div class="col-7 personal-info">
                  <h1>Edit Profile</h1>              
                  <form action="editprofile.php" method="post">
                        <div class="form-group editprofile">
                          <div class="row">
                                <div class="col-md-5 mt-3">
                                First name :
                                <input class="fname short-input" name="fname" type="text">
                                </div>
                                <div class="col-md-5 mt-3">
                                Last name :
                                <input class="lname short-input" name="lname" type="text">
                                </div>
                                <div class="col-md-5 mt-3">
                                User name :
                                <input class="lname short-input" name="username" type="text">
                                </div>
                          </div>
                          <div class="group-button mt-5">
                            <button type="submit" name="save" id="save-profile" value="editprofile">Save</button>
                          </div>
                        </div>  
                  </form>

                  <form action="editpassword.php" method="post">
                    <div class="pass">
                      <div class="row">
                            <div class="col-md-5 mt-3">
                              Password :
                              <input id="pass"
                                type="password"
                                name="pass">
                            </div>
                            <div class="col-md-5 mt-3">
                            Confirm Password :
                            <input id="confirm_pass"
                              type="password"
                              name="confirm_pass"
                              onkeyup="validate_password()">
                            </div>
                      </div>
                      <span id="wrong_pass_alert"></span>
                      <div class="group-button mt-5">
                        <button type="submit"
                          name="save-password" 
                          id="save" 
                          value="editpassword">
                          Save
                        </button>

                        <button onclick="history.back()" 
                          name="back" 
                          id="back">
                          Back
                        </button>
                      </div>
                    </div>

                  </form>
                </div>
          </div>
    </div>

  </div>

  <script src="editprofile.js"></script>
  <script>
		function validate_password() {

			var pass = document.getElementById('pass').value;
			var confirm_pass = document.getElementById('confirm_pass').value;
			if (pass != confirm_pass) {
				document.getElementById('wrong_pass_alert').style.color = 'red';
				document.getElementById('wrong_pass_alert').innerHTML
				= '☒ Use same password';
				document.getElementById('create').disabled = true;
				document.getElementById('create').style.opacity = (0.4);
			} else {
				document.getElementById('wrong_pass_alert').style.color = 'green';
				document.getElementById('wrong_pass_alert').innerHTML =
					'🗹 Password Matched';
				document.getElementById('create').disabled = false;
				document.getElementById('create').style.opacity = (1);
			}
		}

		function wrong_pass_alert() {
			if (document.getElementById('pass').value != "" &&
				document.getElementById('confirm_pass').value != "") {
				alert("Your responce is submitted");
			} else {
				alert("Please fill all the fields");
			}
		}
	</script>   
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>