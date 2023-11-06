<?php

include '././koneksi.php';
$data_pinjaman = mysqli_query($koneksi, "SELECT * FROM tbl_pinjaman P, tbl_anggota A, tbl_buku B WHERE P.id_buku = B.id_buku AND P.id_anggota = A.id_anggota AND P.status_pinjaman = '0'");

?> 
<script language="javascript">

// JavaScript Document 
$(document).ready(function () {

    function valregister() {
        $("#id_pinjaman").keyup(function (e) {
            var isi = $(e.target).val();
            $(e.target).val(isi.toUpperCase());
        });

        var cari = '';
        $("#baru").click(function () {
            $("#id_pinjaman").focus();
            cariAnggota(cari);
            $(".input").val('');
        });

        $("#id_pinjaman").change(function () {
            var cari = $("#id_pinjaman").val();
            cariAnggota(cari);
        });

        function cariAnggota(a) {
            var cari = a;

            $.ajax({
                type: "POST",
                url: "content/pengembalian/cari_data_pinjaman.php",
                data: "cari=" + cari,
                success: function (data) {
                    $("#info_anggota").html(data);
                }
            });
            return true;
        }
    }
    valregister();
});

</script>

<h3>Tambah Data Pengembalian</h3>

<hr>

<div id="info_anggota"></div>

<form action="content/pengembalian/simpan_pengembalian.php" method="post">

    <table>

        <tr>
            <td>Pilih Pinjaman</td>
            <td>:</td>
            <td>
                <select name="id_pinjaman" id="id_pinjaman" class="input" required>
                    <option value="">->PILIH<-</option> 
                    <?php while ($row_pinjaman = mysqli_fetch_array($data_pinjaman)) { ?>
                        <option value="<?php echo $row_pinjaman['id_pinjaman']?>"><?php echo $row_pinjaman['nama_anggota']?> <?php echo $row_pinjaman['nama_buku']?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>

        <tr>
            <td>Tanggal Pengembalian</td>
            <td>:</td>
            <td>
                <input type="date" name="tanggal_pengembalian" autocomplete="off" required>
            </td>
        </tr>
        <tr>
            <td>Id Pengembalian</td>
            <td>:</td>
            <td>
                <input type="text" name="id_pengembalian" required>
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
