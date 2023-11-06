<?php
include '././koneksi.php';
$no=1;
$dataCari	= isset($_POST['txtCari']) ? $_POST['txtCari'] : '';
?>
<h3>Data Buku</h3>
<hr>
<a href="media.php?content=tambah_buku">Tambah Data</a>

<div style="text-align: right;margin-bottom: 5px">
	<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="form1" target="_self">
		<b>Nama Buku:</b>
		<input name="txtCari" type="text" value="<?php echo $dataCari; ?>" size="40" maxlength="100" />
		<input name="btnCari" type="submit" value="Cari" />
	</form>
</div>

<table width="100%" align="center" border="1" cellpadding="5">
		<th bgcolor="grey">No</th>
		<th bgcolor="grey">Rak</th>
		<th bgcolor="grey">Kategori</th>
		<th bgcolor="grey">Nama Buku</th>
		<th bgcolor="grey">Harga</th>
		<th bgcolor="grey">Stok</th>
		<th bgcolor="grey">Penerbit</th>
		<th bgcolor="grey">Tools</th>
	</tr>
	<?php
	if(isset($_POST['btnCari'])){
		$data_buku = mysqli_query($koneksi,"SELECT * FROM tbl_penerbit P,tbl_buku B, tbl_rak R WHERE B.id_penerbit=P.id_penerbit  AND B.id_rak=R.id_rak AND nama_buku LIKE '%$dataCari%' ORDER BY nama_buku");
	}else{
		$data_buku = mysqli_query($koneksi,"SELECT * FROM tbl_penerbit P,tbl_buku B, tbl_rak R WHERE B.id_penerbit=P.id_penerbit  AND B.id_rak=R.id_rak");
	}
		while ($row = mysqli_fetch_array($data_buku)) {
	?>
	<tr>
		<td><?php echo $no++?></td>
		<td><?php echo $row['kode_rak']?></td>
		<td><?php echo $row['kategori']?></td>
		<td><?php echo $row['nama_buku']?></td>
		<td><?php echo "Rp. ".number_format($row['harga'])?></td>
		<td><?php echo $row['stok']?></td>
		<td><?php echo $row['nama_penerbit']?></td>
		<td>
			<a href="media.php?content=edit_buku&id=<?php echo $row['id_buku']?>">Edit</a>
			<a href="content/buku/hapus_buku.php?id=<?php echo $row['id_buku']?>">Hapus</a>
		</td>
	</tr>
	<?php 
		}
		?>

</table>