<?php
include '../../koneksi.php';

$id_pinjaman = $_GET['id'];
$data_pinjaman = mysqli_query($koneksi,"SELECT * FROM tbl_pinjaman WHERE id_pinjaman = '$id_pinjaman'");
$row_pinjaman = mysqli_fetch_array($data_pinjaman);
$id_buku = $row_pinjaman['id_buku'];
$data_buku = mysqli_query($koneksi,"SELECT * FROM tbl_buku WHERE id_buku = '$id_buku'");
$row_buku = mysqli_fetch_array($data_buku);
$stok = $row_buku['stok']+1;
$update_buku = mysqli_query($koneksi,"UPDATE tbl_buku SET stok = '$stok' WHERE id_buku = '$id_buku'");
$hapus_buku = mysqli_query($koneksi,"DELETE FROM tbl_pinjaman WHERE id_pinjaman='$id_pinjaman'");

if (!$update_buku) {
  echo "SINTAK UPDATE ERROR :".mysqli_error($koneksi);
} elseif (!$hapus_buku) {
  echo "SINTAK HAPUS ERROR :".mysqli_error($koneksi);
} else {
  echo "<script>alert('Data Berhasil DIbatalkan');window.location.href='../../media.php?content=pinjaman'</script>";
}