<?php
include "db=connection.php";
session_start();
$query = "SELECT * FROM guru WHERE id=".$_POST['id'];
$rs = mysqli_query($con,$query);
$row = mysqli_fetch_array($rs);
//var_dump($query);

echo "<div class='content-wrapper'>
            <div class='card card-primary'>
            <div class='card-header'>
            <h3 class='card-title'>Form Guru  Baru</h3>
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
                <label for='nama'>Nama Guru</label>
                <input type='text' class='form-control' id='nama' name='nama' value='".$row['nama']."' placeholder='Masukkan nama siswa'>
                </div>
                <div class='form-group'>
                <label for='alamat'>Alamat</label>
                <textarea class='form-control' id='alamat' name='alamat' rows='3' value='".$row['alamat']."' placeholder='Masukkan Alamat ...'>".$row['alamat']."</textarea>
                </div>
                <div class='form-group'>
                <label for='no_hp'>Nomor Handphone</label>
                <input type='text' class='form-control' id='no_hp' name='no_hp' value='".$row['nohp']."' placeholder='Masukkan nomor Handphone siswa'>
                </div>
                <div class='form-group'>
                <label for='username'>Username</label>
                <input type='text' class='form-control' id='username' name='username' value='".$row['username']."' placeholder='Masukkan Username'>
                </div>
                <div class='form-group'>
                <label for='password'>Password</label>
                <input type='password' class='form-control' id='password' name='password' value='".$row['password']."' placeholder='Masukkan password'>
                </div>
                <input type='text' name='id' id='id' value='".$_POST['id']."' hidden>
            </div>
            <!-- /.card-body -->

            <div class='card-footer'>
                <button type='button' class='btn btn-primary' onclick='updateguru()'>Submit</button>
            </div>
            </form>
            </div>
            <!-- /.card -->
</div>";
?>
<script>
  function updateguru(){
    var a = $("input[name=nama]").val();
    var b = $('#alamat').val();
    var c = $("input[name=no_hp]").val();
    var d = $("input[name=username]").val();
    var e = $("input[name=password]").val();
    var f = $("input[name=id]").val();
    $.ajax({
        url:"UpdateGuru.php",
        method: "POST",
        asynch: false,
        data:{nama:a,alamat:b,no_hp:c,username:d,password:e,id:f},
        success:function(data){
          reloadPage(2,0,0);
        }
      });
  }
</script>