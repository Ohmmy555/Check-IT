<?php
include('../../Databast/database.php');
mysqli_query($conn,"INSERT INTO TA (idTA,TA_fname,TA_lname,TA_username,TA_password) VALUES ('$std_id','$fname','$lname','$username','$password')")
?>
