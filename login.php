<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="style.css"/>
</head>

<body>    
<div id="wrapper">
    <div id="header">
        <h1 style="color: green">Login</h1>
        <?php
            // Check if error is set and not empty
            if(isset($_GET['error']) && !empty($_GET['error'])) {
                echo '<p style="color: red;">Username atau password salah!</p>';
            }
        ?>
        <form id="loginForm" action="proses_login.php" method="post" onsubmit="return validateForm()">
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
                    <td></td>
                    <td><input type="submit" value="Login"></td>
                </tr>
            </table>
        </form>
        <!-- Tombol Registrasi -->
        <div style="text-align: center; margin-top: 10px;">
         <a style="text-decoration: none; color: green;"> belum memiliki akun?  <a href="register.php" style="text-decoration: bold; color: green;">Registrasi</a>
        </div>
        <div id="footer">
            <h4 style="color: green">web galeri gilang</h4>
        </div>
    </div>
</div>

<script>
    function validateForm() {
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;

        if (username === "" || password === "") {
            alert("Username dan Password wajib diisi!");
            return false;
        }
        return true;
    }
</script>

</body>
</html>
