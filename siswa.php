<?php
include "db=connection.php";
session_start();
$query= "SELECT * FROM siswa";
$rs=mysqli_query($con,$query);
echo "<div class='content-wrapper'>
        <div class='row'>
        <div class='col-12'>
          <div class='card'>
            <div class='card-header'>
              <h3 class='card-title'>Data Siswa</h3>

              <div class='card-tools'>
                <div class='input-group input-group-sm' style='width: 150px;'>
                  <input type='text' name='table_search' class='form-control float-right' placeholder='Search'>

                  <div class='input-group-append'>
                    <button type='button' class='btn btn-default'><i class='fas fa-search'></i></button>
                    <button type='button' class='btn btn-default' onclick='reloadPage(6,0,0)'>Add</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class='card-body table-responsive p-0'>
              <table class='table table-hover'>
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Alamat</th>
                    <th>No Hp</th>
                    <th>Tanggal Lahir</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>";
                $no=1;
                while($row=mysqli_fetch_array($rs)){
                  $query_mapel= "SELECT * FROM siswa";
                  $rs_mapel=mysqli_query($con,$query_mapel);
                  echo"<tr>
                    <td>".$no."</td>
                    <td>".$row['nama']."</td>
                    <td>".$row['alamat']."</td>
                    <td>".$row['nohp']."</td>
                    <td>".$row['tgl']."</td>
                    <td>
                    <button type='button'  class='btn btn-success' data-toggle='modal' data-target='#exampleModal' data-id=".$row['id']."><i class='fa  fa-th-list' aria-hidden='true''></i></button>
                    <button type='submit' onclick='editPage(1,".$row['id'].",0,0)' style='font-size:13px;' class='btn btn-warning'><i class='fa fa-edit' aria-hidden='true''></i></button>
                    <button type='submit' onclick='delsiswa(".$row['id'].")' style='font-size:13px;' class='btn btn-danger'><i class='fa fa-trash' aria-hidden='true'></i></button></td>
                    </td>
                  </tr>";
                  $no++;
                }
                echo"
                </tbody>
              </table>
            </div>


            <!-- Modal -->
            <div class='modal fade' id='exampleModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
              <div class='modal-dialog' role='document'>
                <div class='modal-content'>
                  <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLabel'>Detail</h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                    </button>
                  </div>
                  <div class='modal-body'>
                    <div class='fetched-data'></div>
                  </div>
                  <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                  </div>
                </div>
              </div>
            </div>
            <!--- End Modal ----!>

            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        </div>
        <!-- /.row -->
</div>";
?>
<script>
  function delsiswa(x){
    var txt;
    var r = confirm("Are you sure to delete?");
    if (r == true) {
     $.ajax({
        url:"delsiswa.php",
        method: "POST",
        asynch: false,
        data:{id:x},
        success:function(data){
          if(data=="success"){
            reloadPage(1,0,0);
          }else{
            alert("Fail to Delete");
          }
        }
      });
    } 
  }

  $(document).ready(function(){
        $('#exampleModal').on('show.bs.modal', function (e) {
          var x = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
           // alert(x);
            $.ajax({
                type : 'post',
                url : 'detail.php',
                data :  {id:x},
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
</script>

