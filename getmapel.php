<?php
include "db=connection.php";
$sql = "SELECT * FROM siswa WHERE id=".$_POST['siswa'];
$rs = mysqli_query($con, $sql);
var_dump($sql);
    while ($row= mysqli_fetch_array($rs)) {
        $data= explode(",",$row['mapel']); 
        for($i=0; $i < count($data); $i++){
            $querymapel = "SELECT * FROM mapel WHERE id=".$data[$i];
            $rsmapel=mysqli_query($con,$querymapel);
            $rowmapel = mysqli_fetch_array($rsmapel);
            echo"<option value='".$rowmapel['id']."'>".$rowmapel['nama']."</option>";
}
    }
?>