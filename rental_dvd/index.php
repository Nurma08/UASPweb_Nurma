<?php
include('session.php');
require_login();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
        body {
    background-image: url('assets/img/bg.png'); 
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center;
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0
}
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: #f8f8f8;
        }

        .logo {
            width: 100px;
            max-width: none; 
            height: auto; 
        }

        nav a {
            margin: 0 10px;
            text-decoration: none;
            color: #333;
        }

        .container {
            padding: 20px;
            text-align: center; /* Center align content */       
        }
        .welcome-container {
            background-color: #ffc0cb; /* Warna latar belakang pink */
            padding: 10px;
            margin-bottom: 10px;
            max-width: 200px; 
            margin: auto; /* Center align the container */
            border-radius: 5px; /* Sudut border rounded */
            height: 61px;
        }
        .welcome-text {
            color: #ffffff; /* Warna teks putih */
            font-weight: bold; /* Teks tebal */
            text-align: center; /* Center align text */

        }
        .home-links {
            display: flex;
            justify-content: flex-end; 
            gap: 10px;
            margin-bottom: 20px;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            background-color: #ffc0cb; 
            color: #fff;
            border-radius: 5px;
            text-decoration: none;
            position: fixed;
            bottom: 10px;
            right: 10px;
        }

        .btn:hover {
            background-color: #ffb6c1;
        }

        .posters {
            display: flex;
            flex-wrap: wrap;
        }
        .poster {
            width: 250px;
            height: 350px;
            margin: 10px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo-container">
            <img src="assets/img/logo.png" alt="Logo" class="logo">
        </div>
        <nav>
            <?php if (basename($_SERVER['PHP_SELF']) == 'index.php') { ?>
                <a href="#" disabled>Home</a>
            <?php } else { ?>
                <a href="index.php">Home</a>
            <?php } ?>
            
            <?php if (is_admin()) { ?>
                <a href="dvd.php">Manage DVDs</a>
            <?php } ?>
            
            <a href="kategori.php">Category</a>
            <a href="form_peminjaman.php">Form</a>
        </nav>
    </div>
    <div class="container">
    <div class="welcome-container">
        <h2>Welcome, <?php echo $_SESSION['role']; ?></h2>
    </div>
    <p class="welcome-text">
    </p>
</div>

        <div class="home-links">
            <?php if (is_admin()) { ?>
            <?php } ?>
            <a href="logout.php" class="btn">Logout</a>
        </div>

        <h3></h3>
        <div class="posters">
    <a href="detail.php?id=1">
        <img src="assets/img/poster1.jpeg" alt="Movie Poster 1" class="poster">
    </a>

    <a href="detail.php?id=2">
        <img src="assets/img/poster2.jpeg" alt="Movie Poster 2" class="poster">
    </a>

    <a href="detail.php?id=3">
        <img src="assets/img/poster3.jpeg" alt="Movie Poster 3" class="poster">
    </a>

    <a href="detail.php?id=4">
        <img src="assets/img/poster4.jpg" alt="Movie Poster 4" class="poster">
    </a>

    <a href="detail.php?id=5">
        <img src="assets/img/poster5.jpg" alt="Movie Poster 5" class="poster">
    </a>

    <a href="detail.php?id=6">
        <img src="assets/img/poster6.jpg" alt="Movie Poster 6" class="poster">
    </a>

    <a href="detail.php?id=7">
        <img src="assets/img/poster7.jpg" alt="Movie Poster 7" class="poster">
    </a>

    <a href="detail.php?id=8">
        <img src="assets/img/poster8.jpg" alt="Movie Poster 8" class="poster">
    </a>

    <a href="detail.php?id=9">
        <img src="assets/img/poster9.jpg" alt="Movie Poster 9" class="poster">
    </a>

    <a href="detail.php?id=10">
        <img src="assets/img/poster10.jpg" alt="Movie Poster 10" class="poster">
    </a>
</div>

    </div>
</body>
</html>
