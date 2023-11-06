<?php
include '././koneksi.php';
$id_anggota = $_GET['id'];
$data_anggota = mysqli_query($koneksi, "SELECT * FROM tbl_anggota  WHERE id_anggota='$id_anggota'");
$row = mysqli_fetch_array($data_anggota);
?>
<h3>Edit Data Anggota</h3>
<hr>
<form action="content/anggota/edit_anggota_act.php" method="post">
	<table>
		<tr>
			<td>Nama Anggota</td>
			<td>:</td>
			<td>
				<input type="text" name="nama_anggota" value="<?php echo $row['nama_anggota'] ?>">
				<input type="hidden" name="id_anggota" value="<?php echo $id_anggota ?>">
			</td>
		</tr>
		<tr>
			<td>NO Telp Anggota</td>
			<td>:</td>
			<td>
				<input type="number" name="no_telp_anggota" value="<?php echo $row['no_telp_anggota'] ?>">
			</td>
		</tr>
		<tr>
			<td>Alamat Anggota</td>
			<td>:</td>
			<td>
                <textarea name="alamat_anggota" required><?php echo $row['alamat_anggota'] ?></textarea>
			</td>
		</tr>
		<tr>
			<td>Email Anggota</td>
			<td>:</td>
			<td>
                <input type="text" name="email_anggota" value="<?php echo $row['email_anggota'] ?>">
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