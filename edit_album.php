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
    <title>Edit Album</title>
    <link rel="stylesheet" href="style.css"/>
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: black;
    color: green;
}

h1 {
    text-align: center;
    margin-top: -100px;
    color: green;
}

p {
    text-align: center;
    margin-top: 25px;
    color: green;
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
            background-color: green;
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
}



form table {
    width: 100%;
    margin-top: 20px;
}

form table tr {
    margin-bottom: 15px;
}

form table tr:last-child {
    margin-bottom: 0;
}

form table td {
    padding: 10px;
    color: #6b3b08;
}

form table input[type="text"],
form table input[type="file"],
form table select {
    width: 100%;
    padding: 8px;
    border-radius: 5px;
    border: 1px solid #ccc;
}

form table input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: blue;
    color: black;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

form table input[type="submit"]:hover {
    background-color: green;
}
    </style>
</head>
<body>
<div id="wrapper">
    <div id="header">
    <h1 style="color: green">Website Galeri Gilangg</h1>
    <p>Edit Album Anda!</p>
    <a href="javascript:history.back()" class="back-button"><i class="fas fa-chevron-left"></i></a>
            <a href="logout.php" class="add-button">log out</a>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="album.php">Album</a></li>
        <li><a href="foto.php">Foto</a></li>
    </ul>

    <form action="update_album.php" method="post">
        <?php
            include "koneksi.php";
            $albumid=$_GET['albumid'];
            $sql=mysqli_query($conn,"select * from album where albumid='$albumid'");
            while($data=mysqli_fetch_array($sql)){
        ?>
        <input type="text" name="albumid" value="<?=$data['albumid']?>" hidden>
        <table>
            <tr>
                <td style="color: blue">Nama Album</td>
                <td><input type="text" name="namaalbum" value="<?=$data['namaalbum']?>"></td>
            </tr>
            <tr>
                <td style="color: blue">Deskripsi</td>
                <td><input type="text" name="deskripsi" value="<?=$data['deskripsi']?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Perbarui"></td>
            </tr>
        </table>
        <?php
            }
        ?>
    </form>
    <div id="footer">
		<h4 style="color: green">web galeri gilangg</h4>
	</div>
</div>
</body>
</html>