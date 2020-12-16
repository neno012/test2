<?php
include "db=connection.php";
session_start();

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
                <input type='text' class='form-control' id='nama' name='nama' placeholder='Masukkan nama guru'>
                </div>
                <div class='form-group'>
                <label for='alamat'>Alamat</label>
                <textarea class='form-control' id='alamat' name='alamat' rows='3' placeholder='Masukkan Alamat ...'></textarea>
                </div>
                <div class='form-group'>
                <label for='no_hp'>Nomor Handphone</label>
                <input type='text' class='form-control' id='no_hp' name='no_hp' placeholder='Masukkan nomor Handphone guru'>
                </div>
                <div class='form-group'>
                <label for='username'>Username</label>
                <input type='text' class='form-control' id='username' name='username' placeholder='Masukkan Username'>
                </div>
                <div class='form-group'>
                <label for='password'>Password</label>
                <input type='password' class='form-control' id='password' name='password' placeholder='Masukkan password'>
                </div>

            </div>
            <!-- /.card-body -->

            <div class='card-footer'>
                <button type='button' class='btn btn-primary' onclick='insertguru()'>Submit</button>
            </div>
            </form>
            </div>
            <!-- /.card -->
</div>";
?>
<script>
  function insertguru(){
    var a = $("input[name=nama]").val();
    var b = $('#alamat').val();
    var c = $("input[name=no_hp]").val();
    var d = $("input[name=username]").val();
    var e = $("input[name=password]").val();

    $.ajax({
        url:"InsertGuru.php",
        method: "POST",
        asynch: false,
        data:{nama:a,alamat:b,no_hp:c,username:d,password:e},
        success:function(data){
          reloadPage(2,0,0);
        }
      });
  }
</script>