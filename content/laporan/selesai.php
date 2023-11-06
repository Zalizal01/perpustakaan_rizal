<?php
$data_pengembalian = mysqli_query($koneksi, "SELECT * FROM tbl_pinjaman P, tbl_pengembalian N, tbl_buku B, tbl_anggota A WHERE N.id_pinjaman = P.id_pinjaman AND P.id_buku = B.id_buku AND P.id_anggota = A.id_anggota AND tanggal_pinjam >= '$dari' AND tanggal_pinjam <= '$sampai'");

$no = 1;
?>
<table width="100%" align="center" border="1" cellpadding="5">
    <tr>
        <th bgcolor="grey">No</th>
        <th bgcolor="grey">Nama Anggota</th>
        <th bgcolor="grey">Nama Buku</th>
        <th bgcolor="grey">Tanggal Pinjam</th>
        <th bgcolor="grey">Tanggal Kembali</th>
        <th bgcolor="grey">Tanggal Pengembalian</th>
        <th bgcolor="grey">Denda</th>
        <th bgcolor="grey">Total</th>
        <th bgcolor="grey">Status</th>
    </tr>

    <?php while ($row = mysqli_fetch_array($data_pengembalian)) { ?>

        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $row['nama_anggota'] ?></td>
            <td><?php echo $row['nama_buku'] ?></td>
            <td><?php echo tgl_tampil($row['tanggal_pinjam']) ?></td>
            <td><?php echo tgl_tampil($row['tanggal_kembali']) ?></td>
            <td><?php echo tgl_tampil($row['tanggal_pengembalian']) ?></td>
            <td><?php echo $row['denda'] ?></td>
            <td><?php echo $row['total'] ?></td>
            <td>
                <?php if ($row['status_pinjaman'] == '1') {
                    echo "SELESAI";
                } else {
                    echo "MASIH DIPINJAM";
                } ?>
            </td>
        </tr>

    <?php } ?>

</table>
<?php echo mysqli_error($koneksi); ?>
