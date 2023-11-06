<?php 
include '../../koneksi.php';
$id_anggota = $_GET['id'];
$hapus = mysqli_query($koneksi, "DELETE FROM tbl_anggota WHERE id_anggota='$id_anggota'");
if (!$hapus) {
	echo "QUERY ERROR".mysqli_error($koneksi);
} else {
	echo "<script>alert('Data Berhasil Dihapus');window.location.href='../../media.php?content=anggota'</script>";
}
?>