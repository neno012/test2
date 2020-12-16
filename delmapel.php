<?php
include "db=connection.php";

$id = $_POST['id'];

$sql = "DELETE FROM mapel WHERE id=".$id;

if ($con->query($sql) === TRUE) {
    echo "success";
} else {
    echo "error";
}

$con->close();


?>