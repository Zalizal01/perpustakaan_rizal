<?php 
include '../../koneksi.php';
$id_penerbit = $_GET['id'];
$hapus = mysqli_query($koneksi, "DELETE FROM tbl_penerbit WHERE id_penerbit='$id_penerbit'");
if (!$hapus) {
	echo "QUERY ERROR".mysqli_error($koneksi);
} else {
	echo "<script>alert('Data Berhasil Dihapus');window.location.href='../../media.php?content=penerbit'</script>";
}
?>