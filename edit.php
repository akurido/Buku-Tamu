<?php 
include "koneksi.php";
if(isset($_POST['bsimpan'])){
    $id = $_POST['id'];
    $tgl = $_POST['tgl'];

    // htmlspecialchars agar Inputan lebih aman dari injection
    $nama = htmlspecialchars($_POST['nama'], ENT_QUOTES);
    $alamat = htmlspecialchars($_POST['alamat'], ENT_QUOTES);
    $tujuan = htmlspecialchars($_POST['tujuan'], ENT_QUOTES);
    $nope = htmlspecialchars($_POST['nope'], ENT_QUOTES);

    //persiapan query simpan data
    $simpan = mysqli_query($koneksi, "UPDATE ttamu SET nama='$nama', alamat='$alamat',tujuan='$tujuan',nope='$nope', tanggal='$tgl' WHERE id='$id'");

    //pengujian simpan data
    if ($simpan) {
        echo "<script>alert('Simpan data Sukses, Terimakasih..!');
        document.location='admin.php'</script>"; 
        } 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman edit data</title>
    <link rel="icon" href="assets/img/pagojengan.png" type="image/x-icon">
    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-success">
<div class="col-lg-8 mx-auto mt-4 mb-3">
               <div class="card shadow bg-gradient-light"> 
                <!-- card body -->
                    <div class="card-body">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Halaman Edit data </h1>
                            </div>
                            <?php 
	$id = $_GET['id'];
	$tampil =  mysqli_query($koneksi, " SELECT * FROM ttamu where
    id like '%$id%'");
	 while($data = mysqli_fetch_array($tampil)){
	?>

        <form class="user" method="POST" action="">
        <input type="hidden" class="form-control form-control-user"name="id" placeholder="Nama Pengunjung" required value="<?php echo $data['id'] ?>">
        <input type="hidden" class="form-control form-control-user"name="tgl" placeholder="Nama Pengunjung" required value="<?php echo $data['tanggal'] ?>">
        <div class="form-group">
        <input type="text" class="form-control form-control-user"name="nama" placeholder="Nama Pengunjung" required value="<?php echo $data['nama'] ?>">
        </div>
        
        <div class="form-group">
        <input type="text" class="form-control form-control-user"name="alamat" placeholder="Alamat Pengunjung" required value="<?php echo $data['alamat'] ?>">
        </div>
                                
        <div class="form-group">
        <input type="text" class="form-control form-control-user"name="tujuan" placeholder="Tujuan Pengunjung" required value="<?php echo $data['tujuan'] ?>">
        </div>

        <div class="form-group">
        <input type="text" class="form-control form-control-user"name="nope" placeholder="Nomer HP Pengunjung" required value="<?php echo $data['nope'] ?>">
        </div>
        <button type="submit" name="bsimpan" class="btn btn-primary btn-user btn-block">Simpan Data</button>
                                
        </form>
                      
        <a  href="admin.php" class="btn btn-danger mt-5 btn-user btn-block"> back</a>
        <hr>
        <div class="text-center">
        <a class="small" href="#">Kecamatan Paguyangan | 2023 - <?=date('Y')?></a>
        </div>
        </div>
        <!-- end card body -->
        </div>
        </div>
        <!-- end  col-lg-7 -->
    <?php } ?>
</body>
</html>