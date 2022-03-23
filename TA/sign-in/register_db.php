<?php
    session_start();
    include('../../Databast/database.php');
        $fname =mysqli_real_escape_string($conn,$_POST['fname']);
        $lname =mysqli_real_escape_string($conn,$_POST['lname']);
        $username =mysqli_real_escape_string($conn,$_POST['username']);
        $std_id =mysqli_real_escape_string($conn,$_POST['id-student-ta']);
        $password_1=mysqli_real_escape_string($conn,$_POST['password_1']);

        $user_check_query = "SELECT * FROM TA WHERE TA_username = '$username'";
        $queary = mysqli_query($conn,$user_check_query);
        $result = mysqli_fetch_assoc($queary);

        if($result){
            if($result['TA_username'] === $username){
                $_SESSION['error_signin']="Username already exists";
                echo "<script>location.replace('./register.php')</script>";
            }
        }
            $password = md5($password_1);
            $sql = "INSERT INTO TA (idTA,TA_fname,TA_lname,TA_username,TA_password) VALUES ('$std_id','$fname','$lname','$username','$password')";
            mysqli_query($conn,$sql);
            echo "<script>location.replace('../sign-in/loginfinished.php')</script>";
            
    ?>
