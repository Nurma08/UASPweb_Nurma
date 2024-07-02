<?php
include('config.php');

if (isset($_GET['id_dvd'])) {
    $id_dvd = $_GET['id_dvd'];
    
    $query = "SELECT biaya, tanggal_pengembalian FROM tabel_dvd WHERE id_dvd = $id_dvd";
    $result = $conn->query($query);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        $response = array(
            'biaya' => $row['biaya'],
            'tanggal_pengembalian' => $row['tanggal_pengembalian']
        );
        
        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        http_response_code(404);
        echo json_encode(array('message' => 'DVD not found'));
    }
} else {
    http_response_code(400);
    echo json_encode(array('message' => 'Missing id_dvd parameter'));
}

$conn->close();
?>
