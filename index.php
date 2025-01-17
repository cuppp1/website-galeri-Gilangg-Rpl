<?php
    // Pastikan tidak ada output sebelum session_start()
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel="icon" type="imagejpg/" href="">
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
            color: #f58634;
        }

        h1 {
            text-align: center;
            margin-top: 30px;
            color: #f58634;
            font-size: 38px; /* Ukuran judul pada layar besar */
        }

        p {
            text-align: center;
            margin-top: 30px;
            color: #f58634;
            font-size: 48px; /* Ukuran teks pada layar besar */
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
            padding: 40px;
            text-align: center;
            margin-top: 40px;
        }

        ul li {
            display: inline;
            margin-right: 10px;
        }

       
        a {
            text-decoration: none;
            color:   #f58634;
            transition: color 0.3s ease;
            margin-right: 10px;
        }

        a:hover {
            color:  blue;
        }

        b {f
            color: #f58634;
        }

        .register-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .register-button:hover {
            background-color: pink;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #f58634;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #495057;
        }

        .category-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 2px;
            column-gap: 600px;
            max-width: 9000px; /* Mengatur lebar maksimum kontainer */
            margin: 0 auto; /* Pusatkan kontainer di tengah */
        }

        .category-item {
            width: calc(20% - 20px);
            padding: 10px;
            background-color: #f58634;
            border-radius: 100px;
            box-shadow: 0 0 10px pink;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .category-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }

        .category-item img {
            display: block;
            margin: 0 auto;
            border-radius: 100px;
        }

        .category-item p {
            margin-top: 10px;
            font-size: 16px;
            text-align: center;
            color: white;
        }

        .login-message {
            text-align: center;
            margin-top: 20px;
            color: pink;
            font-size: 18px;
        }

        .landing-page {
            display: <?php echo isset($_SESSION['userid']) ? 'none' : 'block'; ?>;
            text-align: center;
            margin-top: 20px;
            color: pink;
        }

        .category-icon {
        width: 50%; /* Mengatur lebar gambar sesuai dengan lebar kontainer */
        height: auto; /* Memastikan gambar tetap proporsional */
        border-radius: 5px;
        }

        /* Tambahkan media queries untuk ukuran layar yang lebih kecil */
        @media screen and (max-width: 768px) {
            .category-container {
                column-gap: 20px; /* Mengurangi jarak antar kolom */
                max-width: 90%; /* Mengatur lebar maksimum kontainer */
            }

            .category-item {
                width: calc(33.33% - 20px); /* Mengatur lebar item kategori pada layar kecil */
            }

            .category-icon {
                width: 100%; /* Mengatur lebar gambar sesuai dengan lebar kontainer */
            }

            h1 {
                font-size: 24px; /* Mengurangi ukuran judul pada layar kecil */
                margin-top: 10px; /* Mengurangi jarak atas judul pada layar kecil */
            }

            p {
                font-size: 14px; /* Mengurangi ukuran teks pada layar kecil */
            }

            ul li a {
                padding: 5px 10px; /* Mengurangi padding tombol pada layar kecil */
            }
        }
    </style>
</head>
<body>
    <h1>Website Galeri Gilangg</h1>
    <div class="landing-page">
        <p>temukan dan mulailah momen berharga anda di sini!</p>
    </div>
    <a href="javascript:history.back()" class="back-button"><i class="fas fa-chevron-left"></i></a>
            <a href="logout.php" class="add-button">log out</a>
    <?php
        if(!isset($_SESSION['userid'])){
    ?>
            <ul>
                <li><a href="register.php">Register</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
    <?php
        } else {
    ?>   
        <p>Selamat datang <b><?=$_SESSION['namalengkap']?></b></p>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="album.php">Album</a></li>
            <li><a href="foto.php">Foto</a></li>
        </ul>
    <?php
        }
    ?>
    <!-- category -->
    <?php
        // Cek apakah pengguna sudah login
        if(isset($_SESSION['userid'])) {
    ?>
    <div class="section">
        <div class="tabel">
            
            <div class="category-container">
                <?php
                    include "koneksi.php";
                    $sql=mysqli_query($conn,"select * from album,user where album.userid=user.userid");
                    if(mysqli_num_rows($sql) > 0){
                        while($data=mysqli_fetch_array($sql)){
                ?>
                    <div class="category-item" style="margin-top: 20px; margin-bottom: 50px;">
                        <a href="galeri.php?kat=<?php echo $data['albumid'] ?>">
                        <img src="icon1.jpg" alt="<?php echo $data['namaalbum'] ?>" class="category-icon">
                         <p style="text-align: center;"><?php echo $data['namaalbum'] ?></p>
                         <p style="text-align: left:"><?php echo $data['deskripsi'] ?></p>
                        </a>
                    </div>

                <?php 
                        }
                    } else {
                ?>
                        <p style="text-align: center;">Kategori tidak ada</p>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php
        }
    ?>

</body>
</html>
