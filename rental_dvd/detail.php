<?php
include('config.php'); 

$film_id = $_GET['id'] ?? null;

$selected_film = null;
if ($film_id) {
    $sql = "SELECT * FROM film WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $film_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $selected_film = $result->fetch_assoc();
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Film</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            padding: 20px;
            background-image: url('assets/img/bg.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .film-info {
            margin-bottom: 20px;
        }
        .film-info h2 {
            color: #333;
        }
        .film-info p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="container">
    <?php
        if ($selected_film) {
            echo "<div class='film-info'>";
            echo "<h2>Detail Film</h2>";
            echo "<p><strong>Judul:</strong> {$selected_film['judul']}</p>";
            echo "<p><strong>Genre:</strong> {$selected_film['genre']}</p>";
            echo "<p><strong>Tahun Produksi:</strong> {$selected_film['tahun_produksi']}</p>";
            echo "<p><strong>Sinopsis:</strong> {$selected_film['sinopsis']}</p>";
            echo "<p><strong>Pemain:</strong> {$selected_film['pemain']}</p>";
            echo "<p><strong>Durasi:</strong> {$selected_film['durasi']} menit</p>";
            echo "<p><strong>Sutradara:</strong> {$selected_film['sutradara']}</p>";
            echo "</div>";
        } else {
            echo "<p>Film tidak ditemukan.</p>";
        }
        ?>
        <nav>
        <a href="index.php" class="btn">Home</a>
        <a href="form_peminjman.php" class="btn">Form</a>
    </nav>
    </div>
</body>
</html>