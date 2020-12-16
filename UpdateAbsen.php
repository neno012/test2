<?php
include "db=connection.php";
$id = $_POST['id'];
$siswa = $_POST['siswa'];
$guru= $_POST['guru'];
$mapel= $_POST['mapel'];
$nilai= $_POST['nilai'];

$sql = "UPDATE absen SET siswa='".$siswa."',guru='".$guru."',mapel='".$mapel."',nilai='".$nilai."'  WHERE id=".$id;
var_dump($sql);
if (mysqli_query($con, $sql)) {
    echo "success";

} else {
    echo "Error: " . $sql . "" . mysqli_error($con);
}


$con->close();

?>