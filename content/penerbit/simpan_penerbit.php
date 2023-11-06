<?php 
include '../../koneksi.php';
$id_penerbit = $_POST['id_penerbit'];
$nama_penerbit = $_POST['nama_penerbit'];
$kota_penerbit = $_POST['kota_penerbit'];
$no_telp_penerbit = $_POST['no_telp_penerbit'];
$alamat_penerbit = $_POST['alamat_penerbit'];
$simpan = mysqli_query($koneksi,"INSERT INTO tbl_penerbit (id_penerbit,nama_penerbit,no_telp_penerbit,kota_penerbit,alamat_penerbit) VALUES ('$id_penerbit','$nama_penerbit','$no_telp_penerbit','$kota_penerbit','$alamat_penerbit')");
if (!$simpan) {
	echo "SINTAK ERROR:".mysqli_error($koneksi);
}else{
	echo "<script>alert('Data Berhasil Disimpan');window.location.href='../../media.php?content=penerbit'</script>";
}