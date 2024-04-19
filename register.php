<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="style.css"/>
    
</head>
<body>
<div id="wrapper">
    <div id="header">
    <h1 style="color: green">Registrasi</h1>
    <?php
        // Check if user is not logged in
        if(!isset($_SESSION['userid'])) {
    ?>
    <!-- Button login jika pengguna belum login -->
    
    <?php } ?>
    <form action="proses_register.php" method="post" onsubmit="return validateForm()">
        <table>
            <tr>
                <td style="color: green">Username</td>
                <td><input type="text" name="username" id="username"></td>
            </tr>
            <tr>
                <td style="color: green">Password</td>
                <td><input type="password" name="password" id="password"></td>
            </tr>
            <tr>
                <td style="color: green">Email</td>
                <td><input type="email" name="email" id="email"></td>
            </tr>
            <tr>
                <td style="color: green">Nama Lengkap</td>
                <td><input type="text" name="namalengkap" id="namalengkap"></td>
            </tr>
            <tr>
                <td style="color: green">Alamat</td>
                <td><input type="text" name="alamat" id="alamat"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="register"></td>
            </tr>
        </table>
    </form>
    <div style="text-align: center; margin-bottom: 10px;">
    <a style="text-decoration: none; color: green;">sudah memiliki akun?  <a href="login.php" style="text-decoration: bold; color: green;">Login</a>
    </div>
    <div id="footer">
    <h4 style="color: green">web galeri gilang</h4>
    </div>
</div>

<script>
    function validateForm() {
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;
        var email = document.getElementById("email").value;
        var namalengkap = document.getElementById("namalengkap").value;
        var alamat = document.getElementById("alamat").value;

        if (username === "" || password === "" || email === "" || namalengkap === "" || alamat === "") {
            alert("Semua kolom harus diisi!");
            return false;
        }
        return true;
    }
</script>

</body>
</html>
