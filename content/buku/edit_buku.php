<?php

include '././koneksi.php';

$id_buku=$_GET['id'];
$data_buku=mysqli_query($koneksi, "SELECT * FROM tbl_buku B, tbl_rak R, tbl_penerbit P WHERE B.id_rak=R.id_rak AND B.id_penerbit=P.id_penerbit AND id_buku= '$id_buku'");
$row = mysqli_fetch_array($data_buku);
$data_penerbit=mysqli_query($koneksi, "SELECT * FROM tbl_penerbit"); 
$data_rak=mysqli_query($koneksi, "SELECT * FROM tbl_rak");
?>
<h3>Edit Data Buku</h3>
<hr>
<form action="content/buku/edit_buku_act.php" method="post">
  <table>
    <tr>
      <td>Pilih Rak</td>
      <td>:</td>
      <td>
        <input type="hidden" name="id_buku" value="<?php echo $row['id_buku']?>"> 
        <select name="id_rak"> 
          <option value="<?php echo $row['id_rak']?>"><?php echo $row['kode_rak']?></option>
          <?php
            while($row_rak=mysqli_fetch_array($data_rak)) {
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
        <input type="text" name="id_buku" value="<?php echo $row['kategori']?>">
      </td>
    </tr>
    <tr>
    <tr>
      <td>kategori</td>
      <td>:</td>
      <td>
        <input type="text" name="kategori" value="<?php echo $row['kategori']?>">
      </td>
    </tr>
    <tr>
      <td>Nama Buku</td>
      <td>:</td>
      <td>
        <input type="text" name="nama_buku" value="<?php echo $row['nama_buku']?>">
      </td>
    </tr>
    <tr>
      <td>Harga</td>
      <td>:</td>
      <td>
        <input type="number" name="harga" value="<?php echo $row['harga']?>">
      </td>
    </tr>
    <tr>
      <td>Stok</td>
      <td>:</td>
      <td>
        <input type="text" name="stok" value="<?php echo $row['stok']?>">
      </td>
    </tr>
    <tr>
      <td>Pilih Penerbit</td>
      <td>:</td>
      <td>
        <select name="id_penerbit">
          <option value="<?php echo $row['id_penerbit']?>"><?php echo $row['nama_penerbit']?></option>
          <?php while ($row_penerbit=mysqli_fetch_array($data_penerbit)) {
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