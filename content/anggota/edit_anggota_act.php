<?php
include '../../koneksi.php';
$id_anggota = $_POST['id_anggota'];
$nama_anggota = $_POST['nama_anggota'];
$no_telp_anggota = $_POST['no_telp_anggota'];
$alamat_anggota = $_POST['alamat_anggota'];
$email_anggota = $_POST['email_anggota'];
$edit = mysqli_query($koneksi,"UPDATE tbl_anggota SET nama_anggota='$nama_anggota',no_telp_anggota='$no_telp_anggota',alamat_anggota='$alamat_anggota',email_anggota='$email_anggota' WHERE id_anggota='$id_anggota'");
if (!$edit) {
	echo "SINTAK ERROR".mysqli_error($koneksi);
}else{
	echo "<script>alert('Data Berhasil Dirubah');window.location.href='../../media.php?content=anggota'</script>";
}
?>