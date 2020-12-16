<?php
include "db=connection.php";
session_start();
$query = "SELECT  DISTINCT siswa FROM absen order by siswa ASC";
$rs = mysqli_query($con,$query);
echo "<div class='content-wrapper'>
        <div class='row'>
        <div class='col-12'>
          <div class='card'>
            <div class='card-header'>
              <h3 class='card-title'>Data Penilaian Siswa</h3>

              <div class='card-tools'>
                <div class='input-group input-group-sm' style='width: 150px;'>
                  <input type='text' name='table_search' class='form-control float-right' placeholder='Search'>

                  <div class='input-group-append'>
                    <button type='submit' class='btn btn-default'><i class='fas fa-search'></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class='card-body table-responsive p-0'>
              <table class='table table-hover'>
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Siswa</th>
                    <th>Mapel</th>
                    <th>Level</th>
                    <th>Total nilai</th>
                  </tr>
                </thead>
                <tbody>";
                $no=1;
                while($row=mysqli_fetch_array($rs)){
                  $querysiswa= "SELECT * FROM siswa where id=".$row['siswa'];
                  $rssiswa=mysqli_query($con,$querysiswa);
                  $rowssiswa=mysqli_fetch_array($rssiswa);

                  $querys = "SELECT  DISTINCT mapel FROM absen where siswa=".$row['siswa']." order by siswa ASC";
                  $rss = mysqli_query($con,$querys);

                  $querys2 = "SELECT  DISTINCT mapel FROM absen where siswa=".$row['siswa']." order by siswa ASC";
                  $rss2 = mysqli_query($con,$querys2);

                  $querys3 = "SELECT  DISTINCT mapel FROM absen where siswa=".$row['siswa']." order by siswa ASC";
                  $rss3 = mysqli_query($con,$querys3);

                  
                  // $queryl = "SELECT  * FROM absen where siswa=".$row['siswa']." order by siswa ASC";
                  // $rsl = mysqli_query($con,$queryl);
                  echo"<tr>
                    <td>".$no."</td>
                    <td>".$rowssiswa['nama']."</td>
                    <td>";
                    while($rows=mysqli_fetch_array($rss)){
                      $querymapel= "SELECT * FROM mapel where id=".$rows['mapel'];
                      $rsmapel=mysqli_query($con,$querymapel);
                      $rowmapel=mysqli_fetch_array($rsmapel);

                      echo"
                      <p>".$rowmapel['nama']."</p>
                      ";
                    }
                    
                    echo"</td>
                    <td>";
                    while($rows2=mysqli_fetch_array($rss2)){
                      $querymapel2= "SELECT SUM(nilai) as sum_nilai FROM absen where mapel=".$rows2['mapel'];
                      $rsmapel2=mysqli_query($con,$querymapel2);
                      $rowmapel2=mysqli_fetch_array($rsmapel2);
                      $level=$rowmapel2['sum_nilai'];
                      if($level < 100){
                        $level=1;
                      }
                      elseif($level > 99 && $level < 199){
                        $level=2;
                      }
                      else{
                        $level=3;
                      }

                      echo"
                      <p>".$level."</p>
                      ";
                    }
                    echo"
                    </td>
                    <td>";
                    while($rows3=mysqli_fetch_array($rss3)){
                      $querymapel3= "SELECT SUM(nilai) as sum_nilai FROM absen where mapel=".$rows3['mapel'];
                      $rsmapel3=mysqli_query($con,$querymapel3);
                      $rowmapel3=mysqli_fetch_array($rsmapel3);
                      $nilai=$rowmapel3['sum_nilai'];
                      //var_dump($querymapel3);
                      echo"
                      <p>".$nilai."</p>
                      ";
                    }
                    echo"
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


