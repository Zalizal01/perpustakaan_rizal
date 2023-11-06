<?php
include '././koneksi.php';
$no=1;
$dataCari	= isset($_POST['txtCari']) ? $_POST['txtCari'] : '';
?>
<h3>Data Anggota</h3>
<hr>
<a href="media.php?content=tambah_anggota">Tambah Data</a>

<div style="text-align: right;margin-bottom: 5px">
	<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="form1" target="_self">
		<b>Nama Anggota:</b>
		<input name="txtCari" type="text" value="<?php echo $dataCari; ?>" size="40" maxlength="100" />
		<input name="btnCari" type="submit" value="Cari" />
	</form>
</div>

<table width="100%" align="center" border="1" cellpadding="5">
		<th bgcolor="grey">NO</th>
		<th bgcolor="grey">NAMA</th>
		<th bgcolor="grey">TELEPON</th>
		<th bgcolor="grey">ALAMAT</th>
		<th bgcolor="grey">EMAIL</th>
		<th bgcolor="grey">TOOLS</th>
	</tr>
	<?php
	if(isset($_POST['btnCari'])){
		$data_penerbit = mysqli_query($koneksi,"SELECT * FROM tbl_anggota WHERE nama_anggota LIKE '%$dataCari%' ORDER BY nama_anggota");
	}else{
		$data_penerbit = mysqli_query($koneksi,"SELECT * FROM tbl_anggota");
	}
		while ($row = mysqli_fetch_array($data_penerbit)) {
	?>
	<tr>
		<td><?php echo $no++?></td>
		<td><?php echo $row['nama_anggota']?></td>
		<td><?php echo $row['no_telp_anggota']?></td>
		<td><?php echo $row['alamat_anggota']?></td>
		<td><?php echo $row['email_anggota']?></td>
		<td>
			<a href="media.php?content=edit_anggota&id=<?php echo $row['id_anggota']?>">Edit</a>
			<a href="content/anggota/hapus_anggota.php?id=<?php echo $row['id_anggota']?>">Hapus</a>
		</td>
	</tr>
	<?php 
		}
		?>

</table>