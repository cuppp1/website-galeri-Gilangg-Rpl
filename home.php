<?php
    session_start();
    if(!isset($_SESSION['userid'])){
        header("location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
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
}

h1 {
    text-align: center;
    margin-top: 30px;
    color: green;
}

p {
    text-align: center;
    margin-top: 40px;
    color: green;
    font-size: 350%
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
    padding: 70px;
    text-align: center;
    margin-top: 70px;
}

ul li {
    display: inline;
    margin-right: 60px;
}

a {
            text-decoration: none;
            color:   pink;
            transition: color 0.3s ease;
            margin-right: 10px;
        }

        a:hover {
            color:  blue;
        }

        b {
            color: green;
        }


    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Home</title>
</head>
<body>
    <h1>Website Galeri Foto</h1>
    <p>Selamat datang <b><?=$_SESSION['namalengkap']?></b></p>
    <a href="javascript:history.back()" class="back-button"><i class="fas fa-chevron-left"></i></a>
            <a href="logout.php" class="add-button">log out</a>
    
<ul>  
        <li><a href="index.php">Home</a></li>
        <li><a href="album.php">Album</a></li>
        <li><a href="foto.php">Foto</a></li>
      
</ul>    

</body>
</html>