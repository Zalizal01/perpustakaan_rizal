<?php

include '../../koneksi.php';

$id = $_GET['id'];

$hapus_pengembalian = mysqli_query($koneksi, "DELETE FROM tbl_pengembalian WHERE id_pinjaman='$id'");
$hapus_pinjaman = mysqli_query($koneksi, "DELETE FROM tbl_pinjaman WHERE id_pinjaman='$id'");

if (!$hapus_pinjaman) {
    echo "SINTAK ERROR: " . mysqli_error($koneksi);
} elseif (!$hapus_pengembalian) {
    echo "SINTAK ERROR: " . mysqli_error($koneksi);
} else {
    echo "<script>alert('Data Berhasil Dihapus'); window.location.href='../../media.php?content=pengembalian'</script>";
}

?>
