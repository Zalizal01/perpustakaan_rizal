<?php 
include '../../koneksi.php';
$id_anggota = $_POST['id_anggota'];
$nama_anggota = $_POST['nama_anggota'];
$no_telp_anggota = $_POST['no_telp_anggota'];
$alamat_anggota = $_POST['alamat_anggota'];
$email_anggota = $_POST['email_anggota'];
$simpan = mysqli_query($koneksi,"INSERT INTO tbl_anggota (id_anggota,nama_anggota,no_telp_anggota,alamat_anggota,email_anggota) VALUES ('$id_anggota','$nama_anggota','$no_telp_anggota','$alamat_anggota','$email_anggota')");
if (!$simpan) {
	echo "SINTAK ERROR:".mysqli_error($koneksi);
}else{
	echo "<script>alert('Data Berhasil Disimpan');window.location.href='../../media.php?content=anggota'</script>";
}