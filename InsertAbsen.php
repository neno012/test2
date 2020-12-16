<?php
include "db=connection.php";

$siswa = $_POST['siswa'];
$guru = $_POST['guru'];
$mapel = $_POST['mapel'];
$nilai = $_POST['nilai'];
$date = date('y-m-d');





$sql = "INSERT INTO absen VALUES ('','".$date."','".$siswa."','".$guru."','".$mapel."','".$nilai."')";
//var_dump($sql);
	if (mysqli_query($con, $sql)) {
		echo "success";
	} else {
		echo "Error: " . $sql . "" . mysqli_error($con);
	//	header("location:index.php");
	}
	$con->close();


?>