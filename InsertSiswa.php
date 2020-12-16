<?php
include "db=connection.php";

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];
$tgl = $_POST['tgl'];
$mapel = $_POST['mapel'];
$level='1';
var_dump($no_hp);

$cek_login = mysqli_num_rows(mysqli_query($con, "SELECT * FROM siswa WHERE nohp = '$no_hp'"));
 
if ( $cek_login > 0 ){
	echo " Maaf Username sudah terdaftar ";
} else{
	$sql = "INSERT INTO siswa VALUES ('','".$nama."','".$alamat."','".$no_hp."','".$tgl."','".$mapel."','".$level."')";
	//var_dump($sql);
	if (mysqli_query($con, $sql)) {
		echo "success";
	} else {
		echo "Error: " . $sql . "" . mysqli_error($con);
	//	header("location:index.php");
	}
}
$con->close();

?>