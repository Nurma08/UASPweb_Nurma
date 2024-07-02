<?php
include('config.php');
include('session.php');
require_login();

if (isset($_POST['create'])) {
    $judul = $_POST['judul'];
    $genre = $_POST['genre'];
    $tahun_rilis = $_POST['tahun_rilis'];
    $status_ketersediaan = isset($_POST['status_ketersediaan']) ? 1 : 0;
    $biaya = $_POST['biaya_sewa'];

$poster_path = '';
if ($_FILES['poster']['error'] == UPLOAD_ERR_OK) {
    $poster_name = $_FILES['poster']['name'];
    $poster_tmp_name = $_FILES['poster']['tmp_name'];
    $poster_path = 'assets/img/' . $poster_name; 
    move_uploaded_file($poster_tmp_name, $poster_path);
}

    $sql = "INSERT INTO tabel_dvd (judul, genre, tahun_rilis, status_ketersediaan) VALUES ('$judul', '$genre', '$tahun_rilis', '$status_ketersediaan')";
    if ($conn->query($sql) === TRUE) {

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_POST['update'])) {
    $id_dvd = $_POST['id_dvd'];
    $judul = $_POST['judul'];
    $genre = $_POST['genre'];
    $tahun_rilis = $_POST['tahun_rilis'];
    $status_ketersediaan = isset($_POST['status_ketersediaan']) ? 1 : 0;
    $biaya = $_POST['biaya'];
    
    $poster_path = '';
    if ($_FILES['poster']['error'] == UPLOAD_ERR_OK) {
        $poster_name = $_FILES['poster']['name'];
        $poster_tmp_name = $_FILES['poster']['tmp_name'];
        $poster_path = 'posters/' . $poster_name; // Simpan di direktori 'posters'
        move_uploaded_file($poster_tmp_name, $poster_path);
    }

    $sql = "UPDATE tabel_dvd SET judul='$judul', genre='$genre', tahun_rilis='$tahun_rilis', status_ketersediaan='$status_ketersediaan' WHERE id_dvd='$id_dvd'";
    if ($conn->query($sql) === TRUE) {
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['delete'])) {
    $id_dvd = $_GET['delete'];
    $sql = "DELETE FROM tabel_dvd WHERE id_dvd='$id_dvd'";
    if ($conn->query($sql) === TRUE) {
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$result = $conn->query("SELECT * FROM tabel_dvd");

if ($result === false) {
    die("Error fetching data: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DVD Management</title>
    <style>
        body {
            background-image: url('assets/img/bg.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
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
        nav {
            display: flex;
        }
        nav a {
            margin: 0 10px;
            text-decoration: none;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .btn {
            padding: 8px 16px;
            border: none;
            background-color: #007bff;
            color: white;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="header">
        <img src="assets/img/logo.png" alt="Logo" class="logo">
        <nav>
            <a href="index.php">Home</a>
            <a href="logout.php">Logout</a>
        </nav>
    </div>

    <div class="container">
    <h2>DVD Management</h2>
    <form method="POST" action="" enctype="multipart/form-data">
    <input type="hidden" name="id_dvd" id="id_dvd">
    Judul: <input type="text" name="judul" id="judul"><br>
    Genre: <input type="text" name="genre" id="genre"><br>
    Tahun Rilis: <input type="number" name="tahun_rilis" id="tahun_rilis"><br>
    Status Ketersediaan: <input type="checkbox" name="status_ketersediaan" id="status_ketersediaan"><br>
    Poster DVD: <input type="file" name="poster" id="poster"><br>
    Biaya Sewa: <input type="number" name="biaya_sewa" id="biaya_sewa" step="0.01"><br>
    <button type="submit" name="create" id="create">Create</button>
    <button type="submit" name="update" id="update" style="display: none;">Update</button>
</form>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Genre</th>
            <th>Tahun Rilis</th>
            <th>Status Ketersediaan</th>
            <th>Action</th>
        
        </tr>
        <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['id_dvd']; ?></td>
            <td><?php echo $row['judul']; ?></td>
            <td><?php echo $row['genre']; ?></td>
            <td><?php echo $row['tahun_rilis']; ?></td>
            <td><?php echo $row['status_ketersediaan'] ? 'Available' : 'Not Available'; ?></td>
            <td>
                <button onclick="editDVD(<?php echo $row['id_dvd']; ?>, '<?php echo $row['judul']; ?>', '<?php echo $row['genre']; ?>', <?php echo $row['tahun_rilis']; ?>, <?php echo $row['status_ketersediaan']; ?>)">Edit</button>
                <a href="?delete=<?php echo $row['id_dvd']; ?>">Delete</a>
            </td>
        </tr>
        <?php } ?>
       
         <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create'])) { ?>
                <tr>
                    <td><?php echo $conn->insert_id; ?></td>
                    <td><?php echo $_POST['judul']; ?></td>
                    <td><?php echo $_POST['genre']; ?></td>
                    <td><?php echo $_POST['tahun_rilis']; ?></td>
                    <td><?php echo isset($_POST['status_ketersediaan']) ? 'Available' : 'Not Available'; ?></td>
                    <td><?php echo $_POST['biaya_sewa']; ?></td>
                    <td>
                        <button onclick="editDVD(<?php echo $conn->insert_id; ?>, '<?php echo $_POST['judul']; ?>', '<?php echo $_POST['genre']; ?>', <?php echo $_POST['tahun_rilis']; ?>, <?php echo isset($_POST['status_ketersediaan']) ? 1 : 0; ?>)">Edit</button>
                        <a href="?delete=<?php echo $conn->insert_id; ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
    </table>

    <script>
    function editDVD(id, judul, genre, tahun_rilis, status_ketersediaan) {
        document.getElementById('id_dvd').value = id;
        document.getElementById('judul').value = judul;
        document.getElementById('genre').value = genre;
        document.getElementById('tahun_rilis').value = tahun_rilis;
        document.getElementById('status_ketersediaan').checked = status_ketersediaan;
        document.getElementById('create').style.display = 'none';
        document.getElementById('update').style.display = 'inline';
    }
    </script>
</body>
</html>
