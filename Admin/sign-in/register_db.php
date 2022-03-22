<?php
    session_start();
    include('../../Databast/database.php');
        $fname =mysqli_real_escape_string($conn,$_POST['fname']);
        $lname =mysqli_real_escape_string($conn,$_POST['lname']);
        $username =mysqli_real_escape_string($conn,$_POST['username']);
        $admin_id =mysqli_real_escape_string($conn,$_POST['id-admin']);
        $password_1=mysqli_real_escape_string($conn,$_POST['password_1']);

        $user_check_query = "SELECT * FROM Admin WHERE Admin_username = '$username'";
        $queary = mysqli_query($conn,$user_check_query);
        $result = mysqli_fetch_assoc($queary);

        if($result){
            if($result['Admin_username'] === $username){
                $_SESSION['error_signin']="Username already exists";
                echo "<script>location.replace('./register.php')</script>";
            }if($result['idAdmin'] === $admin_id){
                $_SESSION['error_signin']="Student ID already exists";
                echo "<script>location.replace('./register.php')</script>";
            }
        }else{
            $password = md5($password_1);
            $sql = "INSERT INTO Admin (idAdmin,Admin_fname,Admin_lname,Admin_username,Admin_password) VALUES ('$admin_id','$fname','$lname','$username','$password')";
            mysqli_query($conn,$sql);
            echo "<script>location.replace('../log-in/login.php')</script>";
            $_SESSION['error_signin']="Wrong username or password try again";
            //echo "<script>location.replace('./register.php')</script>";
        }
    ?>
