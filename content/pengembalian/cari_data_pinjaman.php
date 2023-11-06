<?php

include '../../koneksi.php';

$id_pinjaman = $_POST['cari'];

$data_pinjaman = mysqli_query($koneksi, "SELECT * FROM tbl_pinjaman P, tbl_buku B, tbl_anggota A WHERE P.id_buku=B.id_buku AND P.id_anggota=A.id_anggota AND P.id_pinjaman='$id_pinjaman'");

?>

<table>

  <?php while ($row = mysqli_fetch_array($data_pinjaman)) { ?>

    <tr>

      <td>Nama Anggota</td>

      <td>:</td>

      <td>
        <?php echo $row['nama_anggota'] ?>
      </td>

    </tr>

    <tr>

      <td>Nama Buku</td>

      <td>:</td>

      <td>
        <?php echo $row['nama_buku'] ?>
      </td>

    </tr>

    <tr>

      <td>Tanggal Pinjam</td>

      <td>:</td>

      <td>
        <?php echo $row['tanggal_pinjam'] ?>
      </td>

    </tr>

    <tr>

      <td>Tanggal Kembali</td>

      <td>:</td>

      <td>
        <?php echo $row['tanggal_kembali'] ?>
      </td>

    </tr>

  <?php } ?>

</table>