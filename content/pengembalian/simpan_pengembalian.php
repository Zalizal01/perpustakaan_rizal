<?php

include '../../koneksi.php';

$id_pinjaman = $_POST['id_pinjaman']; 
$tanggal_pengembalian = $_POST['tanggal_pengembalian'];

$data_pinjaman = mysqli_query($koneksi, "SELECT * FROM tbl_pinjaman P, tbl_buku B, tbl_anggota A WHERE P.id_buku=B.id_buku AND P.id_anggota=A.id_anggota AND id_pinjaman='$id_pinjaman'"); 
$row_pinjaman = mysqli_fetch_array($data_pinjaman);

$tanggal_kembali = new DateTime($row_pinjaman['tanggal_kembali']); 
$denda = $row_pinjaman['harga']*0.1;

$stok = $row_pinjaman['stok']+1;

$status_pinjaman = 1;

$id_buku = $row_pinjaman['id_buku'];


if ($tanggal_kembali > $tanggal_pengembalian) {

    $total_denda = 0; 
    $total_harga = $row_pinjaman['harga'];

} else {

    $d = $tanggal_kembali->diff($tanggal_pengembalian)->days + 1; 
    $total_denda = $denda * $d;
    $total_harga = $row_pinjaman[ 'harga'] + $total_denda;

}

$update_buku = mysqli_query($koneksi, "UPDATE tbl_buku SET stok='$stok' WHERE id_buku='$id_buku'");


$update_pinjaman = mysqli_query($koneksi, "UPDATE tbl_pinjaman SET status_pinjaman='$status_pinjaman' WHERE id_pinjaman='$id_pinjaman'");

$simpan_pengembalian = mysqli_query($koneksi, "INSERT INTO tbl_pengembalian (id_pinjaman, tanggal_pengembalian, denda, total) VALUES ('$id_pinjaman', '$tanggal_pengembalian', '$total_denda', $total_harga)");

if (!$update_buku || !$update_pinjaman || !$simpan_pengembalian) {

    echo "SINTAK ERROR:".mysqli_error($koneksi);

} else { 
    echo "<script>alert('Pengembalian Berhasil Dibuat');window.location.href='../../media.php?content=pengembalian'</script>";
}