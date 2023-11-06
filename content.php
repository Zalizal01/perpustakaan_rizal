<?php
if (isset($_GET['content'])) {
	if ($_GET['content'] == 'home') {
		include 'content/home.php';

	} elseif ($_GET['content'] == "penerbit") {
		include 'content/penerbit/penerbit.php';
	} elseif ($_GET['content'] == "tambah_penerbit") {
		include 'content/penerbit/tambah_penerbit.php';
	} elseif ($_GET['content'] == "edit_penerbit") {
		include 'content/penerbit/edit_penerbit.php'; 

	} elseif ($_GET['content'] == "anggota") {
		include 'content/anggota/anggota.php';
	} elseif ($_GET['content'] == "tambah_anggota") {
		include 'content/anggota/tambah_anggota.php';
	} elseif ($_GET['content'] == "edit_anggota") {
		include 'content/anggota/edit_anggota.php';

	} elseif ($_GET['content'] == "buku") {
		include 'content/buku/buku.php';
	} elseif ($_GET['content'] == "tambah_buku") {
		include 'content/buku/tambah_buku.php';
	} elseif ($_GET['content'] == "edit_buku") {
		include 'content/buku/edit_buku.php';

	} elseif ($_GET['content'] == "pinjaman") {
		include 'content/pinjaman/pinjaman.php';
	} elseif ($_GET['content'] == "tambah_pinjaman") {
		include 'content/pinjaman/tambah_pinjaman.php';
	} elseif ($_GET['content'] == "edit_pinjaman") {
		include 'content/pinjaman/edit_pinjaman.php';

	} elseif ($_GET['content'] == "pengembalian") {
		include 'content/pengembalian/pengembalian.php';
	} elseif ($_GET['content'] == "tambah_pengembalian") {
		include 'content/pengembalian/tambah_pengembalian.php';

	} elseif ($_GET['content'] == "laporan") {
		include 'content/laporan/laporan.php';
	} elseif ($_GET['content'] == "hasil_laporan") {
		include 'content/laporan/hasil_laporan.php';
	} 
	else {
		echo "MODUL BELUM DIBIKIN";
	}
}
?>