 <!-- Panggil File header -->
<?php include "header.php"; ?>

<?php
// var_dump($_SESSION);

// pengujian tombol simpan
if(isset($_POST['bsimpan'])){
    $tgl = date('Y-m-d');

    // htmlspecialchars agar Inputan lebih aman dari injection
    $nama = htmlspecialchars($_POST['nama'], ENT_QUOTES);
    $alamat = htmlspecialchars($_POST['alamat'], ENT_QUOTES);
    $tujuan = htmlspecialchars($_POST['tujuan'], ENT_QUOTES);
    $nope = htmlspecialchars($_POST['nope'], ENT_QUOTES);

    //persiapan query simpan data
    $simpan = mysqli_query($koneksi, "INSERT INTO ttamu VALUES 
    ('','$tgl', '$nama', '$alamat', '$tujuan', '$nope')");

    //pengujian simpan data
    if ($simpan) {
       echo "<script>alert('simpan data Sukses, Terimakasih..!');
            document.location='?'</script>"; 

    } else {
        echo "<script>alert('simpan Data GAGAL!!!');
                document.location='?'</script>"; 
    }
}

?>


        <!-- head -->
        <div class="head text-center">
            <img src="assets/img/pagojengan.png" width="120">
            <h2 class="text-white">Sistem Informasi Buku Tamu <br> Kecamatan Paguyangan </h2>
        </div>
        <!-- end head -->

        <!-- row -->
        <div class="row mt-2">
            <!-- col-lg-7 -->
            <div class="col-lg-7 mb-3">
               <div class="card shadow bg-gradient-light"> 
                <!-- card body -->
                    <div class="card-body">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Identitas Pengunjung</h1>
                            </div>
                            <form class="user" method="POST" action="">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user"name="nama" placeholder="Nama Pengunjung" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user"name="alamat" placeholder="Alamat Pengunjung" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user"name="tujuan" placeholder="Tujuan Pengunjung" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user"name="nope" placeholder="Nomer HP Pengunjung" required>
                                </div>

                                <button type="submit" name="bsimpan" class="btn btn-primary btn-user btn-block">Simpan Data</button>
                               
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="#">Kecamatan Paguyangan | 2023 - <?=date('Y')?></a>
                            </div>
                    </div>
                    <!-- end card body -->
                </div>
            </div>
            <!-- end  col-lg-7 -->
            
            <!-- col-lg-5 -->
            <div class="col-lg-5 mb-3">
                <!-- card -->
                <div class="card shadow"> 
                    <!-- card body -->
                    <div class="card-body">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Statistik Pengunjung</h1>
                            </div>
                            <?php
                                //deklarasi tanggal

                                //sekarang
                                $tgl_sekarang = date ('Y-m-d');
                                //kemarin
                                $kemarin = date ('Y-m-d', strtotime('-1 day', strtotime(date('Y-m-d'))));

                                $seminggu = date ('Y-m-d h:i:s', strtotime('-1 week +1 day', strtotime
                                ($tgl_sekarang)));

                                $sekarang = date ('Y-m-d h:i:s');

                                //persiapan query jumlah data pengunjung

                                $tgl_sekarang = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(*)
                                FROM ttamu where tanggal like '%$tgl_sekarang%'"));

                                $kemarin = mysqli_fetch_array(mysqli_query(
                                    $koneksi,
                                    "SELECT count(*)FROM ttamu where tanggal like '%$kemarin%'"
                                ));

                                $seminggu = mysqli_fetch_array(mysqli_query(
                                    $koneksi,
                                    "SELECT count(*)FROM ttamu where tanggal BETWEEN '$seminggu' and '$sekarang'"
                                ));

                                $bulan_ini = date ('m');

                                $sebulan = mysqli_fetch_array(mysqli_query(
                                    $koneksi,
                                    "SELECT count(*)FROM ttamu where month (tanggal) = '$bulan_ini'"
                                ));

                                $keseluruhan = mysqli_fetch_array(mysqli_query(
                                    $koneksi,
                                    "SELECT count(*)FROM ttamu"
                                ));

                            ?>
                            <table class="table bordered">
                                <tr>
                                    <td>Hari ini.</td>
                                    <td><?=$tgl_sekarang[0]?></td>
                                </tr>
                                <tr>
                                    <td>Kemarin.</td>
                                    <td><?=$kemarin[0]?></td>
                                </tr>
                                <tr>
                                    <td>Minggu ini.</td>
                                    <td><?=$seminggu[0]?></td>
                                </tr>
                                <tr>
                                    <td>Bulan ini.</td>
                                    <td><?=$sebulan[0]?></td>
                                </tr>
                                <tr>
                                    <td>Keseluruhan.</td>
                                    <td><?=$keseluruhan[0]?></td>
                                </tr>

                            </table>
                    </div>
                    <!-- card body -->
                </div>
                <!-- end card -->
                <?php if($_SESSION['role']=='user') {?>
                    <a href="Logout.php" class="btn btn-danger mb-3"><i class="fa
                            fa-sign-out-alt"></i>Logout</a>
                    <?php }?>
            </div>  
            <!-- end col-lg-5 -->
            
        </div>
        <!-- end row -->
       <?php if($_SESSION['role']=='admin'){ ?>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-3">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pengunjung Hari ini [<?= date('d-m-Y') ?>]</h6>
                        </div>
                        <div class="card-body">
                            <a href="rekapitulasi.php" class="btn btn-success mb-3"><i class="fa
                            fa-table"></i>Rekapitulasi Pengunjung</a>
                            <a href="Logout.php" class="btn btn-danger mb-3"><i class="fa
                            fa-sign-out-alt"></i>Logout</a>


                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Tanggal</th>
                                            <th>Nama Pengunjung</th>
                                            <th>Alamat</th>
                                            <th>Tujuan</th>
                                            <th>No. HP</th>
                                            <th>Action</th>
                                        </tr>
                                    <thead>
                                    <!-- <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>Tanggal</th>
                                            <th>Nama Pengunjung</th>
                                            <th>Alamat</th>
                                            <th>Tujuan</th>
                                            <th>No. HP</th>
                                        </tr>
                                    </tfoot> -->
                                    <tbody>
                                        <?php
                                        $tgl = date('Y-m-d'); //2023-01-09
                                        $tampil = mysqli_query($koneksi, " SELECT * FROM ttamu where
                                        tanggal like '%$tgl%' order by id desc");
                                        $no = 1;

                                        while($data = mysqli_fetch_array($tampil)){
                                        ?>
                                             <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?=$data['tanggal']?></td>
                                                <td><?=$data['nama']?></td>
                                                <td><?=$data['alamat']?></td>
                                                <td><?=$data['tujuan']?></td>
                                                <td><?=$data['nope']?></td>
                                                <td>
                                                    <a href="edit.php?id=<?php echo $data['id']; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="greenColor" class="bi bi-pencil-square" viewBox="0 0 16 16"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                        </svg>
                                                    |<a href="hapus.php?id=<?php echo $data['id']; ?>" > <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="danggerColor" class="bi bi-trash3" viewBox="0 0 16 16"><path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                                        </svg>
                                            </td>
                                            </tr>
                                        <?php } ?> 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <?php } ?>

<?php include "footer.php"; ?> 