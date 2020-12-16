<?php
include "db=connection.php";
$id = $_POST['id'];
$nama = $_POST['nama'];


$sql = "UPDATE mapel SET nama='".$nama."'  WHERE id=".$id;
if (mysqli_query($con, $sql)) {
    echo "success";

} else {
    echo "Error: " . $sql . "" . mysqli_error($con);
}


$con->close();


?>