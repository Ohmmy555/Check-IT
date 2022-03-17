<?php
    include('server.php');

        $fname =mysqli_real_escape_string($conn,$_POST['fname']);
        $lname =mysqli_real_escape_string($conn,$_POST['lname']);
        $username =mysqli_real_escape_string($conn,$_POST['username']);
        $password_1=mysqli_real_escape_string($conn,$_POST['password_1']);
        $password_2=mysqli_real_escape_string($conn,$_POST['password_2']);

            $password = md5($password_1);
            $sql = "INSERT INTO ta (fname ,lname,username,password) VALUES ('$fname','$lname','$username','$password')";
            mysqli_query($conn,$sql);
            echo "<script>location.replace('regisrer.php');</script>";
    ?>
