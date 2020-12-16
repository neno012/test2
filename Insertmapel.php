<?php
include "db=connection.php";

$nama = $_POST['nama'];





$sql = "INSERT INTO mapel VALUES ('','".$nama."')";
var_dump($sql);
	if (mysqli_query($con, $sql)) {
		echo "success";
	} else {
		echo "Error: " . $sql . "" . mysqli_error($con);
	//	header("location:index.php");
	}
	$con->close();


?>