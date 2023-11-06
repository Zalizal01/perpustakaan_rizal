<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login-Perpustakaan</title>
    <link rel="stylesheet" type="text/css" href="desain/login.css">
</head>
<body>
    <?php
    if (isset($_GET['validasi'])) {
        if($_GET['validasi']=='gagal') {
            $validasi = "Username Atau Password Salah";
        }
    }else {
        $validasi = "";
    }
    ?>
    <h1 class="judul">SMK INFORMATIKA CBI</h1>
    <h2 style="text-align: center">Perpustakaan</h2>
    <div class="box-login">
        <form action="cek_login.php" method="post">
            <table width="100%">
                <tr>
                    <td colspan="2" align="center" class="form-login">Form Login</td>
                </tr>
                <tr>
                    <td colspan="2" align="center" class="validasi"><?php echo $validasi;?></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" class="input-login" id="username" placeholder="input username" required></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" class="input-login" id="password" placeholder="input password" required></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" class="btn-login">Login</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>