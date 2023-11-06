<h3>Tambah Data Anggota</h3>
<hr>
<form action="content/anggota/simpan_anggota.php" method="post">
	<table>
		<tr>
			<td>ID anggota</td>
			<td>:</td>
			<td>
				<input type="number" name="id_anggota" placeholder="Input ID anggota" required>
			</td>
		</tr>
		<tr>
			<td>Nama anggota</td>
			<td>:</td>
			<td>
				<input type="text" name="nama_anggota" placeholder="Input Nama Anggota" required>
			</td>
		</tr>
		<tr>
			<td>No Telp Anggota</td>
			<td>:</td>
			<td>
				<input type="number" name="no_telp_anggota" placeholder="Input Telp Anggota" required>
			</td>
		</tr>
		<tr>
			<td>Alamat Anggota</td>
			<td>:</td>
			<td>
                <textarea name="alamat_anggota" required></textarea>
			</td>
		</tr>
		<tr>
			<td>Email Anggota</td>
			<td>:</td>
			<td>
                <input type="text" name="email_anggota" placeholder="Input Email Anggota" required>
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