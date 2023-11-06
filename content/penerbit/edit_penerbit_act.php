<?php
include '../../koneksi.php';
$id_penerbit = $_POST['id_penerbit'];
$nama_penerbit = $_POST['nama_penerbit'];
$kota_penerbit = $_POST['kota_penerbit'];
$no_telp_penerbit = $_POST['no_telp_penerbit'];
$alamat_penerbit = $_POST['alamat_penerbit'];
$edit = mysqli_query($koneksi,"UPDATE tbl_penerbit SET nama_penerbit='$nama_penerbit',no_telp_penerbit='$no_telp_penerbit',kota_penerbit='$kota_penerbit',alamat_penerbit='$alamat_penerbit' WHERE id_penerbit='$id_penerbit'");
if (!$edit) {
	echo "SINTAK ERROR".mysqli_error($koneksi);
}else{
	echo "<script>alert('Data Berhasil Dirubah');window.location.href='../../media.php?content=penerbit'</script>";
}
?>