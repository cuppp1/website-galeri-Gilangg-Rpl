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
    <title>Edit Foto</title>
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
    margin-top: -130px;
    color: green;
}

p {
    text-align: center;
    margin-top: 20px;
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
    margin-top: 30px;
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
    color: black;
}

form table input[type="text"],
form table input[type="file"],
form table select {
    width: 100%;
    padding: 8px;
    border-radius: 100px;
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
    <p>Edit foto anda!</p>
    <a href="javascript:history.back()" class="back-button"><i class="fas fa-chevron-left"></i></a>
            <a href="logout.php" class="add-button">log out</a>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="album.php">Album</a></li>
        <li><a href="foto.php">Foto</a></li>
       
    </ul>

    <form action="update_foto.php" method="post">
        <?php
            include "koneksi.php";
            $fotoid=$_GET['fotoid'];
            $sql=mysqli_query($conn,"select * from foto where fotoid='$fotoid'");
            while($data=mysqli_fetch_array($sql)){
        ?>
        <input type="text" name="fotoid" value="<?=$data['fotoid']?>" hidden>
        <table>
            <tr>
                <td style="color: blue">Judul</td>
                <td><input type="text" name="judulfoto" value="<?=$data['judulfoto']?>"></td>
            </tr>
            <tr>
                <td style="color: blue">Deskripsi</td>
                <td><input type="text" name="deskripsifoto" value="<?=$data['deskripsifoto']?>"></td>
            </tr>
            <tr>
                <td style="color: blue">Lokasi File</td>
                <td><input type="file" name="lokasifile"></td>
            </tr>
            <tr>
                <td style="color: blue">Album</td>
                <td>
                    <select name="albumid">
                    <?php
                        $userid=$_SESSION['userid'];
                        $sql2=mysqli_query($conn,"select * from album where userid='$userid'");
                        while($data2=mysqli_fetch_array($sql2)){
                    ?>
                            <option value="<?=$data2['albumid']?>" <?php if($data2['albumid']==$data['albumid']){echo 'selected';}?>><?=$data2['namaalbum']?></option>
                    <?php
                        }
                    ?>
                    </select>
                    
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Edit"></td>
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