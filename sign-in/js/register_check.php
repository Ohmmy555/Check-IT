<?php
    $servername ="localhost";
    $username ="root";
    $password ="";
    $dbname ="Users";

    //สร้างคอนเน็คชั่น
    $conn = mysqli_connect($servername,$username,$password,$dbname);
            /*if($_GET['function'] == 'checkusername'){
                $user = $_GET['datarow'];
                $sql = "SELECT * FORM ta WHERE username = '$user'";
                $query = mysqli_query($conn,$sql);
                $row = mysqli_num_rows($query);
                echo $row;
                echo $_GET['value'];
            }*/
            echo 1;
    ?>
