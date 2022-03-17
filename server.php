<?php
    $servername ="localhost";
    $username ="root";
    $password ="";
    $dbname ="Users";

    //สร้างคอนเน็คชั่น
    $conn =mysqli_connect($servername,$username,$password,$dbname);

    //ตรวจสอบคอนเน็คชั่น
    if(!$conn){
        die("Connection failed" . mysqli_connect_error());
    }else{
        echo "Connection successfully";
    }




?>