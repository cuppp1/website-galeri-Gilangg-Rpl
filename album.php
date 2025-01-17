<?php
    session_start();
    if(!isset($_SESSION['userid'])){
        header("location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Album</title>
    <style>
        /* CSS styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: black;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 30px;
            color: #f58634;
        }

        p {
            text-align: center;
            margin-top: 20px;
            color: #f58634;
        }

        /* Tombol log out */
        .add-button {
            position: absolute;
            top: 20px;
            right: 20px;
            text-decoration: none;
            color: black;
            font-size: 16px;
            font-weight: bold;
            padding: 10px 20px;
            background-color: #f58634;
            border-radius: 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
            box-shadow: 0 4px 6px #900c72;
        }

        .add-button:hover {
            background-color: #fff;
            color: #900C72;
        }

        ul {
            list-style-type: none;
            padding: 0;
            text-align: center;
            margin-top: 20px;
        }

        ul li {
            display: inline;
            margin-right: 10px;
            color: blue;
        }

        a {
            text-decoration: none;
            color:   blue;
            transition: color 0.3s ease;
            margin-right: 10px;
        }

        a:hover {
            color:  green;
        }

        b {
            color: green;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f58634;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form table {
            width: 100%;
            border-radius: 10px;
        }

        form table tr {
            margin-bottom: 15px;
            border-radius: 10px;
        }

        form table tr:last-child {
            margin-bottom: 0;
        }

        form table td {
            padding: 10px;
            text-align: center;
        }

        form table input[type="text"] {
            width: 90%;
            padding: 7px;
            border-radius: 10px;
            border: 1px solid black;
        }

        form table input[type="submit"] {
            padding: 10px 20px;
            background-color: black;
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        form table input[type="submit"]:hover {
            background-color: blue;
            color: white;
        }

        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid white;
        }

        th {
            background-color: #f58634;
            color: white;
            text-transform: uppercase;
        }

        tr:nth-child(even) {
            background-color: white;
        }
    
        td:last-child {
            text-align: center;
        }

        a {
            text-decoration: none;
            color: #f58634;
            transition: color 0.3s ease;
            margin-right: 10px;
        }

        a:hover {
            color: blue;;
        }

        b {
            color: blue;;
        }

        /* Responsive CSS */
        @media screen and (max-width: 768px) {
            body {
                font-size: 14px;
            }

            form {
                max-width: 90%;
            }

            table {
                width: 100%;
                font-size: 14px;
            }

            img {
                max-width: 80px;
            }
        }

        @media screen and (max-width: 480px) {
            body {
                font-size: 12px;
            }

            form {
                max-width: 100%;
            }

            table {
                font-size: 12px;
            }

            img {
                max-width: 60px;
            }
        }
    </style>
</head>
<body>
<a href="javascript:history.back()" class="back-button"><i class="fas fa-chevron-left"></i></a>
            <a href="logout.php" class="add-button">log out</a>
    <h1>Website Galeri Gilangg</h1>
    <p>Isi Sesuai Keinginan Anda</p>
    
    <!-- Navigation menu -->
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="album.php">Album</a></li>
        <li><a href="foto.php">Foto</a></li>
    </ul>

    <!-- Form to add album -->
    <form action="tambah_album.php" method="post" onsubmit="return validateForm()">
        <table>
            <tr>
                <td>Nama Album</td>
                <td><input type="text" name="namaalbum" id="namaalbum"></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><input type="text" name="deskripsi" id="deskripsi"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Tambah"></td>
            </tr>
        </table>
    </form>

    <!-- Table to display existing albums -->
    <table border="1" cellpadding=5 cellspacing=0>
        <tr>
            <th>Nama Album</th>
            <th>Deskripsi</th>
            <th>Tanggal dibuat</th>
            <th>Aksi</th>
        </tr>
        <?php
            include "koneksi.php";
            $userid=$_SESSION['userid'];
            $sql=mysqli_query($conn,"select * from album where userid='$userid'");
            while($data=mysqli_fetch_array($sql)){
        ?>
                <tr>
                    <td><?=$data['namaalbum']?></td>
                    <td><?=$data['deskripsi']?></td>
                    <td><?=$data['tanggaldibuat']?></td>
                    <td>
                        <a href="hapus_album.php?albumid=<?=$data['albumid']?>">Hapus</a>
                        <a href="edit_album.php?albumid=<?=$data['albumid']?>">Edit</a>
                    </td>
                </tr>
        <?php
            }
        ?>
    </table>

    <script>
        // JavaScript validation function
        function validateForm() {
            var namaAlbum = document.getElementById("namaalbum").value.trim();
            var deskripsi = document.getElementById("deskripsi").value.trim();

            // Check if any field is empty
            if (namaAlbum === "" || deskripsi === "") {
                alert("Semua kolom wajib diisi!");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>