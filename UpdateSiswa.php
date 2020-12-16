<?php
include "db=connection.php";
$id = $_POST['id'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];
// var_dump($id);
// var_dump($alamat);
// var_dump($no_hp);


$sql = "UPDATE siswa SET alamat='".$alamat."', nohp='".$no_hp."' WHERE id=".$id;
if (mysqli_query($con, $sql)) {
    echo "success";

} else {
    echo "Error: " . $sql . "" . mysqli_error($con);
}


$con->close();


?>