<?php
    $servername ="119.59.104.13";
    $username ="supphita";
    $password ="0646267404@Ohmmy";
    $dbname ="supphita_project";
    $conn = mysqli_connect($servername,$username,$password,$dbname);
    if($conn){
        echo "เชื่อมต่อสำเร็จ";
    }else{
        echo "เชื่อมต่อไม่สำเร็จ";
    }

?>