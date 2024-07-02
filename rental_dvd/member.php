<?php

include('session.php');
require_login();

// Sisipkan file konfigurasi database
include('config.php');

// Query untuk mengambil data anggota dari database
$query = "SELECT * FROM member";
$result = $conn->query($query);

// Mengecek jika terjadi error dalam query
if (!$result) {
    die("Error fetching data: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Members</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .header h2 {
            margin: 0;
        }
        .header a {
            text-decoration: none;
            padding: 8px 16px;
            background-color: #4CAF50;
            color: white;
            border-radius: 4px;
        }
        .header a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Members</h2>
        <a href="add_member.php">Tambah Anggota</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID Anggota</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Nomor Telepon</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['id_anggota']; ?></td>
                    <td><?php echo $row['Nama']; ?></td>
                    <td><?php echo $row['alamat']; ?></td>
                    <td><?php echo $row['nomor_telepon']; ?></td>
                    <td>
                        <!-- Link untuk mengedit anggota -->
                        <a href="edit_member.php?id=<?php echo $row['id_anggota']; ?>">Edit</a>
                        <!-- Link untuk menghapus anggota -->
                        <a href="delete_member.php?id=<?php echo $row['id_anggota']; ?>" onclick="return confirm('Anda yakin ingin menghapus anggota ini?')">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
