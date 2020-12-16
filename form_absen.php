<?php
include "db=connection.php";
session_start();
$query= "SELECT * FROM siswa";
$rs=mysqli_query($con,$query);
$query2= "SELECT * FROM guru";
$rs2=mysqli_query($con,$query2);

//var_dump($query);

echo "<div class='content-wrapper'>
            <div class='card card-primary'>
            <div class='card-header'>
            <h3 class='card-title'>Form Absen Siswa</h3>
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
              echo"<option value='".$row['id']."'>".$row['nama']."</option>";
              }
              echo"
            </select>
            </div>
            <div class='form-group'>
            <label>Nama Guru</label>
            <select class='form-control select2' name='guru' id='guru' style='width: 100%;'>
              <option selected='selected'>Pilih Nama Guru</option>";
              while($row2 = mysqli_fetch_array($rs2)){
              echo"<option value='".$row2['id']."'>".$row2['nama']."</option>";
              }
              echo"
            </select>
            </div>
            <div class='form-group'>
            <label>Nama Mapel</label>
            <select class='form-control select2' name='mapel' id='mapel' style='width: 100%;'>
              <option selected='selected'>Pilih Nama Mapel</option>";
              while($row3 = mysqli_fetch_array($rs3)){
              echo"<option value='".$row3['id']."'>".$row3['nama']."</option>";
              }
              echo"
            </select>
            </div>
            <div class='form-group'>
            <label>Nilai</label>
            <select class='form-control select2' name='nilai' id='nilai' style='width: 100%;'>
              <option selected='selected'>Add Nilai</option>
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
            </div>
            <!-- /.card-body -->

            <div class='card-footer'>
                <button type='button' class='btn btn-primary' onclick='insertabsen()'>Submit</button>
            </div>
            </form>
            </div>
            <!-- /.card -->
</div>";
?>
<script>
  function insertabsen(){
    var a = document.getElementById("siswa").options[document.getElementById("siswa").selectedIndex].value;
    var b = document.getElementById("guru").options[document.getElementById("guru").selectedIndex].value;
    var c = document.getElementById("mapel").options[document.getElementById("mapel").selectedIndex].value;
    var d = document.getElementById("nilai").options[document.getElementById("nilai").selectedIndex].value;

//alert(b);

    $.ajax({
        url:"InsertAbsen.php",
        method: "POST",
        asynch: false,
        data:{siswa:a,guru:b,mapel:c,nilai:d},
        success:function(data){
          reloadPage(4,0,0);
        }
      });
  }

  $("#siswa").change(function(){
            // variabel dari nilai siswa
            var siswa = $("#siswa").val();
            // Menggunakan ajax untuk mengirim dan dan menerima data dari server
            $.ajax({
                type: 'POST',
                url: 'getmapel.php',
                data: {'siswa':siswa},
                success: function(data){
                   $("#mapel").html(data);
                }
            });
        });
</script>