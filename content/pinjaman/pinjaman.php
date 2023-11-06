<?php
include '././koneksi.php';
include '././fungsi_tanggal.php';
$no=1;
$dataCari = isset($_POST['txtCari']) ? $_POST['txtCari'] : ''; // tambahkan ":" setelah kondisi "?"
?>

<h3>Data Peminjaman</h3>
<hr>
<a href="media.php?content=tambah_pinjaman">Tambah Data</a>

<div style="text-align: right;margin-bottom: 5px">
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="form1" target="_self"> <!-- tambahkan "echo" sebelum $_SERVER -->
    <b>Nama Anggota:</b>
    <input name="txtCari" type="text" value="<?php echo $dataCari; ?>" size="40" maxlength="100" />
    <input name="btnCari" type="submit" value="Cari" />
  </form>
</div>

<table width="100%" align="center" border="1" cellpadding="5">
  <tr> <!-- tambahkan "tr" untuk membuka baris -->
    <th bgcolor="grey">No</th>
    <th bgcolor="grey">Nama Anggota</th>
    <th bgcolor="grey">Nama Buku</th>
    <th bgcolor="grey">Tanggal Pinjam</th>
    <th bgcolor="grey">Tanggal Kembali</th>
    <th bgcolor="grey">Status</th>
    <th bgcolor="grey">Tools</th>
  </tr>

<?php
if(isset($_POST['btnCari'])){
  $data_pinjaman = mysqli_query($koneksi, "SELECT * FROM tbl_pinjaman P, tbl_buku B, tbl_anggota A WHERE P.id_buku=B.id_buku AND P.id_anggota=A.id_anggota AND nama_anggota LIKE '%$dataCari%' ORDER BY nama_anggota"); // perbaiki query
}else{
  $data_pinjaman = mysqli_query($koneksi, "SELECT * FROM tbl_pinjaman P, tbl_buku B, tbl_anggota A WHERE P.id_buku=B.id_buku AND P.id_anggota=A.id_anggota");
}

while ($row = mysqli_fetch_array($data_pinjaman)) {
?>
  <tr> <!-- tambahkan "tr" untuk membuka baris -->
    <td><?php echo $no++?></td>
    <td><?php echo $row['nama_anggota']?></td>
    <td><?php echo $row['nama_buku']?></td>
    <td><?php echo tgl_tampil($row['tanggal_pinjam'])?></td>
    <td><?php echo tgl_tampil($row['tanggal_kembali'])?></td>
    <td>
      <?php
        if ($row['status_pinjaman']=='1') { // perbaiki kondisi "if"
          echo "SELESAI";
        }else{
          echo "MASIH DIPINJAM";
        }
      ?>
    </td>
    <td>
      <a href="content/pinjaman/hapus_pinjaman.php?id=<?php echo $row['id_pinjaman']?>">Batalkan</a>
    </td>
  </tr>
<?php
}
?>

</table>