<?php
include('config.php');
include('session.php');
require_login();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_kategori = $_POST['nama_kategori'];

    if (isset($_POST['create'])) {
        $sql = "INSERT INTO tabel_kategori (nama_kategori) VALUES ('$nama_kategori')";
        if ($conn->query($sql) === TRUE) {
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif (isset($_POST['update'])) {
        $id_kategori = $_POST['id_kategori'];
        $sql = "UPDATE tabel_kategori SET nama_kategori='$nama_kategori' WHERE id_kategori='$id_kategori'";
        if ($conn->query($sql) === TRUE) {
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

if (isset($_GET['delete'])) {
    $id_kategori = $_GET['delete'];
    $sql = "DELETE FROM tabel_kategori WHERE id_kategori='$id_kategori'";
    if ($conn->query($sql) === TRUE) {

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$result = $conn->query("SELECT * FROM tabel_kategori");

if ($result === false) {
    die("Error fetching data: " . $conn->error);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Category Film</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
        body {
            background-image: url('assets/img/bg.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            font-family: Arial, sans-serif;
            padding: 20px;
            margin: 0;
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
            max-width: 800px;
            margin: 20px auto;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        td {
            text-align: center;
        }

        form {
            margin-bottom: 20px;
        }

        button {
            padding: 8px 16px;
            border: none;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            border-radius: 4px;
        }

        button#create {
            background-color: #ff69b4; 
        }

        button#update {
            background-color: #ff69b4;
            display: none;
        }

        button:hover {
            background-color: #e6498e;
        }
        button.edit-btn {
            background-color: #ff69b4;
        }
        button.edit-btn:hover {
            background-color: #e6498e; 
        }

        .action-buttons a {
            margin: 0 5px;
            color: #e74c3c;
            text-decoration: none;
        }

        .action-buttons a:hover {
            text-decoration: underline;
        }
        
    </style>
</head>
<body>
    <div class="header">
        <img src="logo.png" alt="Logo" class="logo">
        <nav>
            <a href="index.php">Home</a>
            <a href="kategori.php">Category </a>
            <a href="logout.php">Logout</a>
        </nav>
    </div>

    <h2>Kategori Film Management</h2>
    <form method="POST" action="">
        <input type="hidden" name="id_kategori" id="id_kategori">
        Nama Kategori: <input type="text" name="nama_kategori" id="nama_kategori"><br>
        <button type="submit" name="create" id="create">Create</button>
        <button type="submit" name="update" id="update" style="display: none;">Update</button>
    </form>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Kategori</th>
            <th>Actions</th>
        </tr>
        <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['id_kategori']; ?></td>
            <td><?php echo $row['nama_kategori']; ?></td>
            <td>
            <button onclick="editKategori(<?php echo $row['id_kategori']; ?>, '<?php echo $row['nama_kategori']; ?>')" class="edit-btn">Edit</button>
                <a href="?delete=<?php echo $row['id_kategori']; ?>" style="color: #e74c3c;">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>

    <script>
    function editKategori(id, nama) {
        document.getElementById('id_kategori').value = id;
        document.getElementById('nama_kategori').value = nama;
        document.getElementById('create').style.display = 'none';
        document.getElementById('update').style.display = 'inline';
    }
    </script>
</body>
</html>
