<?php
include('config.php');
include('session.php');
require_login();

$notif_message = '';

if (isset($_POST['pinjam'])) {
    $nama_peminjam = isset($_POST['nama_peminjam']) ? $_POST['nama_peminjam'] : '';
    $no_telepon = $_POST['no_telepon'];
    $email = $_POST['email'];
    $id_dvd = $_POST['id_dvd'];
    $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
       
    $tanggal_pengembalian = date('Y-m-d', strtotime($tanggal_peminjaman . ' + 7 days'));
    
    $query_dvd = "SELECT biaya FROM tabel_dvd WHERE id_dvd = $id_dvd";
    $result_dvd = $conn->query($query_dvd);
    
    if ($result_dvd->num_rows > 0) {
        $row_dvd = $result_dvd->fetch_assoc();
        $biaya = $row_dvd['biaya'];
        
        $sql = "INSERT INTO tabel_peminjaman (nama_peminjam, no_telepon, email, id_dvd, tanggal_peminjaman, tanggal_pengembalian, biaya) 
                VALUES ('$nama_peminjam', '$no_telepon', '$email', '$id_dvd', '$tanggal_peminjaman', '$tanggal_pengembalian', '$biaya')";
        
        if ($conn->query($sql) === TRUE) {
            $notif_message = "Peminjaman DVD berhasil!<br>";
            $notif_message .= "Biaya Peminjaman: $biaya<br>";
            $notif_message .= "Tanggal Pengembalian: $tanggal_pengembalian";
        } else {
            $notif_message = "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        $notif_message = "DVD tidak ditemukan atau biaya tidak dapat diambil.";
    }
}

$result = $conn->query("SELECT * FROM tabel_dvd WHERE status_ketersediaan = 1");

if ($result === false) {
    die("Error fetching DVD data: " . $conn->error);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Peminjaman DVD</title>
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
        .container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            max-width: 600px;
            margin: 20px auto;
            text-align: center; 
        }
        h2 {
            color: #333; 
            text-align: center; 
        form {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            max-width: 600px;
            margin: 20px auto;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type=text], input[type=email], input[type=date], button, select {
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
        width: 100%;
        margin-bottom: 10px;
        font-size: 16px;
        }

        button {
            background-color: #4e0d3f;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #ff99cc;
        }
        .harga {
            display: none; 
        }
        .tanggal_pengembalian {
            display: none; 
        }
        .home-link {
            display: block;
            margin-top: 20px;
            text-align: center;
        }
        .notif {
            margin-top: 20px;
            text-align: center;
            background-color: #ffccff;
            color: white;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            }
    </style>
</head>
<body>
    <h2>Form Peminjaman DVD</h2>
    <form method="POST" action="">
    <label for="nama_peminjam">Nama Peminjam:</label>
        <input type="text" name="nama_peminjam" id="nama_peminjam" required><br><br>
        
        <label for="no_telepon">Nomor Telepon:</label>
        <input type="text" name="no_telepon" id="no_telepon" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br><br>
        
        <label for="id_dvd">Pilih DVD:</label>
        <select name="id_dvd" id="id_dvd" required>
            <option value="">Pilih DVD</option>
            <?php while($row = $result->fetch_assoc()) { ?>
                <option value="<?php echo $row['id_dvd']; ?>"><?php echo $row['judul']; ?></option>
            <?php } ?>
        </select><br><br>
        
         <div class="harga">
            <label for="biaya">Biaya Peminjaman:</label>
            <input type="text" id="biaya" name="biaya" readonly><br><br>
        </div>
        
        <label for="tanggal_peminjaman">Tanggal Peminjaman:</label>
        <input type="date" name="tanggal_peminjaman" id="tanggal_peminjaman" required><br><br>
        
        <div class="tanggal_pengembalian">
            <label for="tanggal_pengembalian">Tanggal Pengembalian:</label>
            <input type="text" id="tanggal_pengembalian" name="tanggal_pengembalian" readonly><br><br>
        </div>
        
        <button type="submit" name="pinjam">Pinjam DVD</button>
    </form>

    <?php if (!empty($notif_message)) { ?>
        <div class="notif">
            <?php echo $notif_message; ?>
        </div>
    <?php } ?>


    <script>
    var dvdSelect = document.getElementById('id_dvd');
    var biayaInput = document.getElementById('biaya');
    var tanggalPeminjamanInput = document.getElementById('tanggal_peminjaman');
    var tanggalPengembalianInput = document.getElementById('tanggal_pengembalian');

    dvdSelect.addEventListener('change', function() {
        var dvdId = this.value;
        if (dvdId !== '') {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'get_dvd_info.php?id_dvd=' + dvdId, true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    var data = JSON.parse(xhr.responseText);
                    biayaInput.value = data.biaya;
                    tanggalPengembalianInput.value = data.tanggal_pengembalian;
                    document.querySelector('.harga').style.display = 'block';
                    document.querySelector('.tanggal_pengembalian').style.display = 'block';
                } else {
                    console.error('Error fetching DVD info');
                }
            };
            xhr.send();
        } else {
            document.querySelector('.harga').style.display = 'none';
            document.querySelector('.tanggal_pengembalian').style.display = 'none';
        }
    });
    </script>

    <div class="home-link">
        <a href="index.php">Kembali ke Halaman Utama</a>
    </div>
</body>
</html>
