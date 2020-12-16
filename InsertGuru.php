<?php
include "db=connection.php";

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];
$username = $_POST['username'];
$password = $_POST['password'];




$sql = "INSERT INTO guru VALUES ('','".$nama."','".$alamat."','".$no_hp."','".$username."','".$password."')";
var_dump($sql);
	if (mysqli_query($con, $sql)) {
		echo "success";
	} else {
		echo "Error: " . $sql . "" . mysqli_error($con);
	//	header("location:index.php");
	}
	$con->close();


?>