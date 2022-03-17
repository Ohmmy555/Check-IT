<?php
    session_start();
    include('server.php');
    $errors = array();
    //if(isset($_POST['login_user'])){
        $username =mysqli_real_escape_string($conn,$_POST['username']);
        $password_1=mysqli_real_escape_string($conn,$_POST['password']);

        /*if(empty($username)){
            array_push($errors,"username is required");
          }
          if(empty($password)){
            array_push($errors,"password is required");
          }*/
          if(count($errors) == 0){
            $password = md5($password_1);
            $sql = "SELECT * FROM ta WHERE username = '$username' AND password = '$password' ";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)==1){
                $_SESSION['username']=$username;
                $_SESSION['success']="You are now logged in";
                echo "<script>location.replace('./index.php');</script>";
            }else{
                array_push($errors,"Wrong username or password combination");
                $_SESSION['error']="Wrong username or password try again";
                echo "<script>location.replace('./login.php');</script>";
            }
    }
//}

?>