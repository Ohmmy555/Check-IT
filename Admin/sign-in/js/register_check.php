<?php
    $servername ="localhost";
    $username ="root";
    $password ="";
    $dbname ="Users";

    //สร้างคอนเน็คชั่น
    $conn = mysqli_connect($servername,$username,$password,$dbname);
            /*if($_GET['id'] == 'check'){
                $user = $_POST['datarow'];
                //$user = 'Ohmmy_2001';
                $user_check_query = "SELECT * FROM ta WHERE username = '$user'";
                $queary = mysqli_query($conn,$user_check_query);
                $result = mysqli_num_rows($queary);
                    //echo "<p>".$result."</p>";
                    echo $result;
            }*/
    ?>
