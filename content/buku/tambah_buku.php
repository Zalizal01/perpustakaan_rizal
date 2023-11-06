<?php
//DATA PILIHAN
include '././koneksi.php';
$data_penerbit = mysqli_query($koneksi,"SELECT * FROM 	tbl_penerbit");
$data_rak = mysqli_query($koneksi,"SELECT * FROM 	tbl_rak");
?>

<h3>Tambah Data Buku</h3>
<hr>
<form action="content/buku/simpan_buku.php" method="post">
	<table>
		<tr>
			<td>Pilih Rak</td>
			<td>:</td>
			<td>
				<select name="id_rak">
					<option value="">->PILIH<-</option>
					<?php 
						while ($row_rak = mysqli_fetch_array($data_rak)) {
						?>
						<option value="<?php echo $row_rak['id_rak']?>"><?php echo $row_rak['kode_rak']?></option>
						<?php
						}
						?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Id Buku</td>
			<td>:</td>
			<td>
				<input type="text" name="id_buku" placeholder="Input ID" required>
			</td>
		</tr>
		<tr>
			<td>kategori</td>
			<td>:</td>
			<td>
				<input type="text" name="kategori" placeholder="Input Kategori" required>
			</td>
		</tr>
		<tr>
			<td>Nama Buku</td>
			<td>:</td>
			<td>
				<input type="text" name="nama_buku" placeholder="Input Judul Buku" required>
			</td>
		</tr>
		<tr>
			<td>Harga</td>
			<td>:</td>
			<td>
				<input type="number" name="harga" placeholder="Input Harga" required>
			</td>
		</tr>
		<tr>
			<td>Stok</td>
			<td>:</td>
			<td>
				<input type="text" name="stok" placeholder="Input Stock">
			</td>
		</tr>
		<tr>
			<td>Pilih Penerbit</td>
			<td>:</td>
			<td>
				<select name="id_penerbit">
					<option value="">->Pilih<-</option>
					<?php while ($row_penerbit = mysqli_fetch_array($data_penerbit)) {
						?>
					<option value="<?php echo $row_penerbit['id_penerbit']?>"><?php echo $row_penerbit['nama_penerbit']?></option>
					<?php
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<button type="submit">&#128190; Simpan</button>
			</td>
			<td>
				<button type="reset">&#128465; Hapus</button>
			</td>
		</tr>
	</table>
</form>