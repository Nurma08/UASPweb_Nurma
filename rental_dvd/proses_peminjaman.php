<?php
include('config.php'); // Menghubungkan ke file konfigurasi database
include('session.php'); // Memastikan pengguna telah login
require_login();

// Memproses data yang dikirimkan dari form
if (isset($_POST['submit'])) {
    // Mengambil nilai dari form
    $id_peminjam = $_POST['id_peminjam'];
    $id_dvd = $_POST['id_dvd'];
    $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
    $tanggal_pengembalian = $_POST['tanggal_pengembalian'];
    $biaya = $_POST['biaya'];

    // Membuat query untuk memasukkan data peminjaman ke dalam tabel
    $sql = "INSERT INTO peminjaman (id_peminjam, id_dvd, tanggal_peminjaman, tanggal_pengembalian, biaya) 
            VALUES ('$id_peminjam', '$id_dvd', '$tanggal_peminjaman', '$tanggal_pengembalian', '$biaya')";

    // Menjalankan query dan memeriksa hasilnya
    if ($conn->query($sql) === TRUE) {
        echo "Peminjaman DVD berhasil dicatat.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Menutup koneksi ke database
    $conn->close();
}
?>
