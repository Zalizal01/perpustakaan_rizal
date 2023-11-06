<?php
    include '././koneksi.php';

    $data_anggota = mysqli_query($koneksi, "SELECT * FROM tbl_anggota"); 
    $data_buku = mysqli_query($koneksi, "SELECT * FROM tbl_buku");
?>
<h3>Tambah Data Pinjaman</h3>
<hr>
<form action="content/pinjaman/simpan_pinjaman.php" method="post">
    <table>
        <tr>
			<td>ID Pinjaman</td>
			<td>:</td>
			<td>
				<input type="number" name="id_pinjaman" placeholder="Input ID anggota" required>
			</td>
		</tr>
        <tr>
            <td>Pilih Anggota</td>
            <td>:</td>
            <td>
                <select name="id_anggota" required>
                    <option value="">->PILIH<-</option>
                    <?php while ($row_anggota = mysqli_fetch_array($data_anggota)) { ?>
                        <option value="<?php echo $row_anggota['id_anggota']?>"><?php echo $row_anggota['nama_anggota']?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Pilih Buku</td>
            <td>:</td>
            <td>
                <select name="id_buku" required>
                    <option value="">->PILIH<-</option>
                    <?php while ($row_buku = mysqli_fetch_array($data_buku)) { ?>
                        <option value="<?php echo $row_buku['id_buku']?>"><?php echo $row_buku['nama_buku']?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Tanggal Pinjam</td>
            <td>:</td>
            <td>
                <input type="date" name="tanggal_pinjam" autocomplete="off" required>
            </td>
        </tr>
        <tr>
            <td>Tanggal Kembali</td>
            <td>:</td>
            <td>
                <input type="date" name="tanggal_kembali" autocomplete="off" required>
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