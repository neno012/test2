<?php
include "db=connection.php";
session_start();
$query = "SELECT * FROM mapel WHERE id=".$_POST['id'];
$rs = mysqli_query($con,$query);
$row = mysqli_fetch_array($rs);
//var_dump($query);

echo "<div class='content-wrapper'>
            <div class='card card-primary'>
            <div class='card-header'>
            <h3 class='card-title'>Form Mapel  Baru</h3>
            <div class='card-tools'>
            <div class='input-group input-group-sm' style='width: 150px;'>
              <div class='input-group-append'>
                <button type='button' class='btn btn-primary' onclick='reloadPage(2,0,0)'><i class='fas fa-chevron-circle-left'></i></button>
              </div>
            </div>
          </div>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role='form'>
            <div class='card-body'>
                <div class='form-group'>
                <label for='nama'>Nama Mata Pelajaran</label>
                <input type='text' class='form-control' id='nama' name='nama' value='".$row['nama']."' placeholder='Masukkan nama siswa'>
                </div>
                <input type='text' name='id' id='id' value='".$_POST['id']."' hidden>
            </div>
            <!-- /.card-body -->

            <div class='card-footer'>
                <button type='button' class='btn btn-primary' onclick='updatemapel()'>Submit</button>
            </div>
            </form>
            </div>
            <!-- /.card -->
</div>";
?>
<script>
  function updatemapel(){
    var a = $("input[name=nama]").val();
    var f = $("input[name=id]").val();
    $.ajax({
        url:"Updatemapel.php",
        method: "POST",
        asynch: false,
        data:{nama:a,id:f},
        success:function(data){
          reloadPage(3,0,0);
        }
      });
  }
</script>