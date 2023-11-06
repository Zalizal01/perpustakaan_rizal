<h3>Tambah Data Penerbit</h3>
<hr>
<form action="content/penerbit/simpan_penerbit.php" method="post">
	<table>
		<tr>
			<td>ID Penerbit</td>
			<td>:</td>
			<td>
				<input type="number" name="id_penerbit" placeholder="Input ID Penerbit" required>
			</td>
		</tr>
		<tr>
			<td>Nama Penerbit</td>
			<td>:</td>
			<td>
				<input type="text" name="nama_penerbit" placeholder="Input Nama Penerbit" required>
			</td>
		</tr>
		<tr>
			<td>Kota Penerbit</td>
			<td>:</td>
			<td>
				<input type="text" name="kota_penerbit" placeholder="Input Kota Penerbit" required>
			</td>
		</tr>
		<tr>
			<td>Nomor Telp Penerbit</td>
			<td>:</td>
			<td>
				<input type="number" name="no_telp_penerbit" placeholder="Input Nomor Telfon Penerbit" required>
			</td>
		</tr>
		<tr>
			<td>Alamat Penerbit</td>
			<td>:</td>
			<td>
				<textarea name="alamat_penerbit" required></textarea>
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