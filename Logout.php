<?php

//session start
session_start();

//menghilangkan sesion yang sudah di set
unset($_SESSION['id_user']);
unset($_SESSION['password']);
unset($_SESSION['nama_pengguna']);
unset($_SESSION['username']);

session_destroy();
echo "<script>
alert('Anda telah keluar dari halaman...!')
document.location='index.php';
</script>";
