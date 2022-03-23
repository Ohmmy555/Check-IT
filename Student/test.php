<?php
$idSubject = $_GET['subject'];
$idTerm = $_GET['term'];
$teacher = $_GET['teacher'];
echo $idSubject . '<br>';
echo $idTerm . '<br>';


include('../Databast/database.php');
$sql = "SELECT * FROM Subject_detail";
echo '12151';
$re = mysqli_query($conn,$sql);
echo($re);
// $row = mysqli_fetch_array($re);
while ($row = mysqli_fetch_array($re)) {
    echo '1';
}
echo '2';
?>
