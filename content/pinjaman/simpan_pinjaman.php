<?php

include '../../koneksi.php';

//Inputan DATA
$id_pinjaman=$_POST['id_pinjaman'];
$id_buku = $_POST['id_buku'];
$id_anggota = $_POST['id_anggota'];
$tanggal_pinjam = $_POST['tanggal_pinjam'];
$tanggal_kembali = $_POST['tanggal_kembali'];
$status_pinjaman = 0;

//Mengambil Data Buku
$data_buku = mysqli_query($koneksi, "SELECT * FROM tbl_buku WHERE id_buku='$id_buku'"); 
$row_buku = mysqli_fetch_array($data_buku);
$stok = $row_buku['stok'] - 1;

//Update Buku Dan Simpan Pinjaman
$edit_buku = mysqli_query($koneksi, "UPDATE tbl_buku SET stok='$stok' WHERE id_buku='$id_buku'"); 
$simpan_pinjaman = mysqli_query($koneksi, "INSERT INTO tbl_pinjaman (id_pinjaman, id_buku, id_anggota, tanggal_pinjam, tanggal_kembali, status_pinjaman) VALUES ('$id_pinjaman','$id_buku', '$id_anggota', '$tanggal_pinjam', '$tanggal_kembali', '$status_pinjaman')");

//Perumpamaan JIKA TERJADI ERROR
if (!$edit_buku) {
  echo "SINTAK ERROR: ".mysqli_error($koneksi);
} elseif (!$simpan_pinjaman) {
  echo "SINTAK ERROR: ".mysqli_error($koneksi);
} else {
  echo "<script>alert('Data Berhasil Disimpan');window.location.href='../../media.php?content=pinjaman'</script>";
}
