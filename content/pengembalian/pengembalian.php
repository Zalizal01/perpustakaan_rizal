<?php include '././koneksi.php';

include '././fungsi_tanggal.php';

$no = 1;

$dataCari = isset($_POST['txtCari']) ? $_POST['txtCari'] : '';

?>

<h3>Data Pengembalian</h3>

<hr>

<a href="media.php?content=tambah_pengembalian">Tambah Data</a>

<div style="text-align: right;margin-bottom: 5px">
  <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="form1" target="_self">

    <b>Nama Anggota:</b>

    <input name="txtCari" type="text" value="<?php echo $dataCari; ?>" size="40" maxlength="100" /> <input
      name="btnCari" type="submit" value="Cari" />

  </form>

</div>

<table width="100%" align="center" border="1" cellpadding="5">

  <tr>

    <th bgcolor="grey">No</th>

    <th bgcolor="grey">Anggota</th>

    <th bgcolor="grey">Buku</th>

    <th bgcolor="grey">Tgl Pinjam</th>

    <th bgcolor="grey">Tgl Kembali</th>

    <th bgcolor="grey">Tgl Pengembalian</th>

    <th bgcolor="grey">Denda</th>

    <th bgcolor="grey">Total</th>

    <th bgcolor="grey">Tools</th>

  </tr>

  

  <?php

  if (isset($_POST['btnCari'])) {

    $data_pengembalian = mysqli_query($koneksi, "SELECT * FROM tbl_pinjaman P, tbl_pengembalian N,tbl_buku B, tbl_anggota A WHERE N.id_pinjaman = P.id pinjaman AND P.id_buku = B.id_buku AND P = P.id_anggota = A.id_anggota AND nama_anggota LIKE '%$dataCari%' ORDER BY nama_anggota");

  } else {

    $data_pengembalian = mysqli_query($koneksi, "SELECT * FROM tbl_pinjaman P, tbl_pengembalian N, tbl_buku B, tbl_anggota A WHERE N.id_pinjaman=P.id_pinjaman AND P.id_buku = B.id_buku AND P.id_anggota = A.id_anggota");

  }

  while ($row = mysqli_fetch_array($data_pengembalian)) {

    ?>

    <tr>

      <td>
        <?php echo $no++ ?>
      </td>

      <td>
        <?php echo $row['nama_anggota'] ?>
      </td>

      <td>
        <?php echo $row['nama_buku'] ?>
      </td>

      <td>
        <?php echo tgl_tampil($row['tanggal_pinjam']) ?>
      </td>

      <td>
        <?php echo tgl_tampil($row['tanggal_kembali']) ?>
      </td>
      <td>
        <?php echo tgl_tampil($row['tanggal_pengembalian']) ?>
      </td>

      <td>
        <?php echo $row['denda'] ?>
      </td>
      <td>
        <?php echo $row['total'] ?>
      </td>

      <td>

        <a href="content/pengembalian/hapus_pengembalian.php?id=<?php echo $row['id_pinjaman'] ?>">

          Batalkan</a>

      </td>

    </tr>

    <?php

  }

  ?>

</table>