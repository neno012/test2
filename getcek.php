<?php
include "db=connection.php";


$cek = $_POST['cek'];
$query = "SELECT * FROM siswa where (nohp='$cek')";
// $login = mysqli_query($con,$query);
// $row = mysqli_fetch_array($login);
//pengecekan kredensial login
if (mysqli_query($con, $squery)) {
    echo "success";
} else {
    echo "Error: " . $sql . "" . mysqli_error($con);
//	header("location:index.php");
}
$con->close();
?>