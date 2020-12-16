<?php
include "db=connection.php";
session_start();
$query= "SELECT * FROM mapel";
$rs=mysqli_query($con,$query);
//var_dump($query);

echo "<div class='content-wrapper'>
            <div class='card card-primary'>
            <div class='card-header'>
            <h3 class='card-title'>Form Siswa  Baru</h3>
            <div class='card-tools'>
            <div class='input-group input-group-sm' style='width: 150px;'>
              <div class='input-group-append'>
                <button type='button' class='btn btn-primary' onclick='reloadPage(1,0,0)'><i class='fas fa-chevron-circle-left'></i></button>
              </div>
            </div>
          </div>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role='form'>
            <div class='card-body'>
                <div class='form-group'>
                <label for='nama'>Nama Siswa</label>
                <input type='text' class='form-control' id='nama' name='nama' placeholder='Masukkan nama siswa'>
                </div>
                <div class='form-group'>
                <label for='alamat'>Alamat</label>
                <textarea class='form-control' id='alamat' name='alamat' rows='3' placeholder='Masukkan Alamat ...'></textarea>
                </div>
                <div class='form-group'>
                <label for='no_hp'>Nomor Handphone</label>
                <input type='text' class='form-control' id='no_hp' name='no_hp' placeholder='Masukkan nomor Handphone siswa'>
                </div>
                <!-- Date dd/mm/yyyy -->
                <div class='form-group'>
                  <label>Tanggal Lahir</label>
                  <div class='input-group'>
                    <input type='date' class='form-control' id='tgl' name='tgl' data-inputmask=''alias': 'dd/mm/yyyy'' data-mask>
                  </div>
                </div>
                <label for='no_hp'>Mapel</label>
                <div class='form-row'>";
                while($row=mysqli_fetch_array($rs)){
                    echo"<div class='col'>
                            <div class='form-check'>
                                <input class='form-check-input' type='checkbox' id='mapel".$row['id']."' name='mapel".$row['id']."' value='".$row['id']."'>
                                <label class='form-check-label'>".$row['nama']."</label>
                            </div>
                        </div>";
                }
            echo"
                </div>
            </div>
            <!-- /.card-body -->

            <div class='card-footer'>
                <button type='button' class='btn btn-primary' onclick='insertSiswa()'>Submit</button>
            </div>
            </form>
            </div>
            <!-- /.card -->
</div>";


?>
<script>
  function insertSiswa(){
    var a = $("input[name=nama]").val();
    var b = $('#alamat').val();
    var c = $("input[name=no_hp]").val();
    var d = document.getElementById("tgl").value;
    var e = [];
      $(".form-check-input").each(function(){
		if($(this).is(":checked"))
			{
				e.push($(this).val());
			}
		});
	e = e.toString();

    $.ajax({
        url:"InsertSiswa.php",
        method: "POST",
        asynch: false,
        data:{nama:a,alamat:b,no_hp:c,tgl:d,mapel:e},
        success:function(data){
          if(data == true){
          reloadPage(1,0,0);
          }else{
            alert('Nomor Handphone Sudah digunakan !');
          }
        }
      });
  }
  
</script>