<?php 
include "koneksi.php";
    $id = $_GET['id'];
  $simpan = mysqli_query($koneksi,"DELETE FROM ttamu WHERE id='$id'") or die(mysq_error());
    // header("location:admin.php"); 
    
    // //pengujian Hapus data
    if ($simpan) {
            echo "<script>alert('Hapus data Sukses, Terimakasih..!');
            document.location='admin.php'</script>"; 
       
            
        } 
?>