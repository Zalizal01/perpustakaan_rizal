<?php
include '././koneksi.php';
include '././fungsi_tanggal.php';

$dari = isset($_POST['dari']) ? $_POST['dari'] : date('Y-m-d');
$sampai = isset($_POST['sampai']) ? $_POST['sampai'] : date('Y-m-d');
$status = isset($_POST['status']) ? $_POST['status'] : 3;
?>

<style type="text/css">
.tombol_cetak{
    text-decoration: none;
    background-color: lightblue;
    padding: 5px;
    border:2px solid black;
    border-radius: 10px;
    color: black;
}
</style>

<h3>Cari Data Laporan</h3>
<hr>
<form action="media.php?content=hasil_laporan" method="post">
  <table>
    <tr>
      <td>Dari Tanggal</td>
      <td>:</td>
      <td>
        <input type="date" name="dari" value="<?php echo $dari ?>" autocomplete="off">
      </td>
    </tr>
    <tr>
      <td>Sampai Tanggal</td>
      <td>:</td>
      <td>
        <input type="date" name="sampai" value="<?php echo $sampai ?>" autocomplete="off">
      </td>
    </tr>
    <tr>
      <td>Status Pinjaman</td>
      <td>:</td>
      <td>
        <input type="radio" name="status" value="1" <?php if($status==1){echo "checked";} ?>> Dipinjam
        <input type="radio" name="status" value="2" <?php if($status==2){echo "checked";} ?>> Selesai
        <input type="radio" name="status" value="3" <?php if($status==3){echo "checked";} ?>> Semua
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <button type="submit">&#128269; Cari</button>
      </td>
      <td>
        <button type="reset">&#128465; Hapus</button>
      </td>
    </tr>
  </table>
</form>

<hr>

<div style="text-align: right;">
  <a href="content/laporan/cetak.php?dari=<?php echo $dari?>&sampai=<?php echo $sampai?>&status=<?php echo $status?>" target="_blank" class="tombol_cetak"> Cetak Data</a>
</div>

<br>

<?php
if ($status == 1) {
  include 'dipinjam.php';
} elseif ($status == 2) {
  include 'selesai.php';
} else {
  include 'semua.php';
}
?>
