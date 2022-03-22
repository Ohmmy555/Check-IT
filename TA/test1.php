<?php

/*$pro = $_POST[$check];
foreach($pro as $value){
    switch($value){
        case "1":
            echo "มา";
            break;
        case "2":
            echo "สาย";
            break;
        case "3":
            echo "ลา";
            break;
        case "4":
            echo "ขาด";
            break;
    }
$num = $num + 1;
}*/


/*$data1 = $_POST['stdid'];
foreach($data1 as $pro){
    foreach($_POST[$pro] as $data2){
      $sql4 = "INSERT INTO Checked(status,idSubject,idTA,idSection,idStudent,trem,check_day) 
      VALUES ('$data2','$sub_id','$username',$sub_sec,'$pro',$sub_term,'$date')";
      mysqli_query($conn, $sql4);
    }}*/


    $t=time();
    echo (date("Y-m-d",$t));
    echo '<p>'.$_SESSION['stdid'].'</p>';
?>