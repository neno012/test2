<?php
include "db=connection.php";
$id = $_POST['id'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
// var_dump($id);
// var_dump($alamat);
// var_dump($no_hp);


$sql = "UPDATE guru SET alamat='".$alamat."', nohp='".$no_hp."',nama='".$nama."',username='".$username."', password='".$password."'  WHERE id=".$id;
if (mysqli_query($con, $sql)) {
    echo "success";

} else {
    echo "Error: " . $sql . "" . mysqli_error($con);
}


$con->close();


?>