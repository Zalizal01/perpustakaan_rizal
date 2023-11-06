<?php
include '../../koneksi.php';

$id_rak = $_POST['id_rak'];
$id_penerbit = $_POST['id_penerbit'];
$id_buku = $_POST['id_buku'];
$kategori = $_POST['kategori'];
$nama_buku = $_POST['nama_buku'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];

$simpan = mysqli_query($koneksi,"INSERT INTO tbl_buku(id_rak,id_penerbit,id_buku,kategori,nama_buku,harga,stok)VALUES('$id_rak','$id_penerbit','$id_buku','$kategori','$nama_buku','$harga','$stok')");
if (!$simpan) {
	echo "SINTAK ERROR:".mysqli_error($koneksi);
}else{
	echo "<script>alert('Data Berhasil Disimpan');window.location.href='../../media.php?content=buku'</script>";
}