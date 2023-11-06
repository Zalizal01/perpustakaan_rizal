<?php
//Memulai sesi login
session_start();

//memanggil data koneksi
include 'koneksi.php';

//menerima data input
$username =$_POST['username'];
$password = md5($_POST['password']);

//query mysql cari data user berdasarkan username dan password yang telat di input
$data = mysqli_query($koneksi,"SELECT *FROM tbl_user WHERE username ='$username' AND password = '$password'");

//menghitung hasil cari user
$cek_data = mysqli_num_rows($data);

//pengecekan dan validasi
if ($cek_data > 0) {
//jika ada
    $_SESSION['login'] = "login";
    header("location:media.php?content=home");
} else {
    //jika tidak ada
    header("location:index.php?validasi=gagal");
}
?>