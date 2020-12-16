<?php
include "db=connection.php";
session_start();
$query= "SELECT * FROM guru";
$rs=mysqli_query($con,$query);
echo "<div class='content-wrapper'>
        <div class='row'>
        <div class='col-12'>
          <div class='card'>
            <div class='card-header'>
              <h3 class='card-title'>Data Guru</h3>

              <div class='card-tools'>
                <div class='input-group input-group-sm' style='width: 150px;'>
                  <input type='text' name='table_search' class='form-control float-right' placeholder='Search'>

                  <div class='input-group-append'>
                    <button type='button' class='btn btn-default'><i class='fas fa-search'></i></button>
                    <button type='button' class='btn btn-default' onclick='reloadPage(7,0,0)'>Add</button>
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
                    <th>Nama Guru</th>
                    <th>Alamat</th>
                    <th>No Hp</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>";
                $no=1;
                while($row=mysqli_fetch_array($rs)){
                  echo"<tr>
                    <td>".$no."</td>
                    <td>".$row['nama']."</td>
                    <td>".$row['alamat']."</td>
                    <td>".$row['nohp']."</td>
                    <td>".$row['username']."</td>
                    <td>".$row['password']."</td>
                    <td>
                    <button type='submit' onclick='editPage(2,".$row['id'].",0,0)' style='font-size:13px;' class='btn btn-warning'><i class='fa fa-edit' aria-hidden='true''></i></button>
                    <button type='submit' onclick='delguru(".$row['id'].")' style='font-size:13px;' class='btn btn-danger'><i class='fa fa-trash' aria-hidden='true'></i></button></td>
                    </td>
                  </tr>";
                  $no++;
                }
                echo"
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        </div>
        <!-- /.row -->
</div>";
?>
<script>
  function delguru(x){
    var txt;
    var r = confirm("Are you sure to delete?");
    if (r == true) {
     $.ajax({
        url:"delguru.php",
        method: "POST",
        asynch: false,
        data:{id:x},
        success:function(data){
          if(data=="success"){
            reloadPage(2,0,0);
          }else{
            alert("Fail to Delete");
          }
        }
      });
    } 
  }
</script>

