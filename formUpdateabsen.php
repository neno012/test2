<?php
include "db=connection.php";
session_start();
$queryu = "SELECT * FROM absen WHERE id=".$_POST['id'];
$rsu = mysqli_query($con,$queryu);
$rowu = mysqli_fetch_array($rsu);
 


$query= "SELECT * FROM siswa";
$rs=mysqli_query($con,$query);
$query2= "SELECT * FROM guru";
$rs2=mysqli_query($con,$query2);
$query3= "SELECT * FROM mapel";
$rs3=mysqli_query($con,$query3);
//var_dump($query);

echo "<div class='content-wrapper'>
            <div class='card card-primary'>
            <div class='card-header'>
            <h3 class='card-title'>Form Update Absen Siswa</h3>
            <div class='card-tools'>
            <div class='input-group input-group-sm' style='width: 150px;'>
              <div class='input-group-append'>
                <button type='button' class='btn btn-primary' onclick='reloadPage(4,0,0)'><i class='fas fa-chevron-circle-left'></i></button>
              </div>
            </div>
          </div>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role='form'>
            <div class='card-body'>
            <div class='form-group'>
            <label>Nama Siswa</label>
            <select class='form-control select2' name='siswa' id='siswa' style='width: 100%;'>
              <option selected='selected'>Pilih Nama Siswa</option>";
              while($row = mysqli_fetch_array($rs)){
              if($rowu['siswa']==$row['id']){
                echo "<option selected='selected' value=".$row['id'].">".$row['nama']." </option>";
              }else{
                echo "<option value=".$row['id'].">".$row['nama']." </option>";
              }
              }
              echo"
            </select>
            </div>
            <div class='form-group'>
            <label>Nama Guru</label>
            <select class='form-control select2' name='guru' id='guru' style='width: 100%;'>
              <option selected='selected'>Pilih Nama Guru</option>";
              while($row2 = mysqli_fetch_array($rs2)){
             if($rowu['guru']==$row2['id']){
                echo "<option selected='selected' value=".$row2['id'].">".$row2['nama']." </option>";
                }else{
              echo"<option value='".$row2['id']."'>".$row2['nama']."</option>";
              }
            }
              echo"
            </select>
            </div>
            <div class='form-group'>
            <label>Nama Mapel</label>
            <select class='form-control select2' name='mapel' id='mapel' style='width: 100%;'>
              <option selected='selected'>Pilih Nama Mapel</option>";
              while($row3 = mysqli_fetch_array($rs3)){
              if($rowu['mapel']==$row3['id']){
                echo "<option selected='selected' value=".$row3['id'].">".$row3['nama']." </option>";
                }else{
              echo"<option value='".$row3['id']."'>".$row3['nama']."</option>";
              }
            }
              echo"
            </select>
            </div>
            <div class='form-group'>
            <label>Nilai</label>
            <select class='form-control select2' name='nilai' id='nilai' style='width: 100%;'>
              <option selected='selected' value='".$rowu['nilai']."'>".$rowu['nilai']."</option>
              <option value='1'>1</option>
              <option value='2'>2</option>
              <option value='3'>3</option>
              <option value='4'>4</option>
              <option value='5'>5</option>
              <option value='6'>6</option>
              <option value='7'>7</option>
              <option value='8'>8</option>
              <option value='9'>9</option>
              <option value='10'>10</option>
            </select>
          </div>
          <input type='text' name='id' id='id' value='".$_POST['id']."' hidden>
            </div>
            <!-- /.card-body -->

            <div class='card-footer'>
                <button type='button' class='btn btn-primary' onclick='updateabsen()'>Submit</button>
            </div>
            </form>
            </div>
            <!-- /.card -->
</div>";
?>
<script>
  function updateabsen(){
    var a = document.getElementById("siswa").options[document.getElementById("siswa").selectedIndex].value;
    var b = document.getElementById("guru").options[document.getElementById("guru").selectedIndex].value;
    var c = document.getElementById("mapel").options[document.getElementById("mapel").selectedIndex].value;
    var d = document.getElementById("nilai").options[document.getElementById("nilai").selectedIndex].value;
    var e = $("input[name=id]").val();
//alert(b);

    $.ajax({
        url:"UpdateAbsen.php",
        method: "POST",
        asynch: false,
        data:{siswa:a,guru:b,mapel:c,nilai:d,id:e},
        success:function(data){
          reloadPage(4,0,0);
        }
      });
  }
</script>