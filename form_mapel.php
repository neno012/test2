<?php
include "db=connection.php";
session_start();

//var_dump($query);

echo "<div class='content-wrapper'>
            <div class='card card-primary'>
            <div class='card-header'>
            <h3 class='card-title'>Form Mapel Baru</h3>
            <div class='card-tools'>
            <div class='input-group input-group-sm' style='width: 150px;'>
              <div class='input-group-append'>
                <button type='button' class='btn btn-primary' onclick='reloadPage(3,0,0)'><i class='fas fa-chevron-circle-left'></i></button>
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
                <input type='text' class='form-control' id='nama' name='nama' placeholder='Masukkan nama Mapel'>
                </div>
            </div>
            <!-- /.card-body -->

            <div class='card-footer'>
                <button type='button' class='btn btn-primary' onclick='insertmapel()'>Submit</button>
            </div>
            </form>
            </div>
            <!-- /.card -->
</div>";
?>
<script>
  function insertmapel(){
    var a = $("input[name=nama]").val();


    $.ajax({
        url:"Insertmapel.php",
        method: "POST",
        asynch: false,
        data:{nama:a},
        success:function(data){
          reloadPage(3,0,0);
        }
      });
  }
</script>