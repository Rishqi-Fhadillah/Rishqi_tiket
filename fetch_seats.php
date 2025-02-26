<?php
require 'koneksi.php';

// Sanitasi dan validasi parameter input
$mall_name = isset($_GET['mall_name']) ? htmlspecialchars($_GET['mall_name']) : null;
$film_name = isset($_GET['film_name']) ? htmlspecialchars($_GET['film_name']) : null;

if (!$mall_name || !$film_name) {
    echo json_encode(["error" => "Parameter tidak lengkap"]);
    exit;
}

// Persiapkan query untuk mengambil kursi yang sudah ditempati
$stmt = $conn->prepare("SELECT seat_number FROM seats WHERE mall_name = ? AND film_name = ?");
$stmt->bind_param("ss", $mall_name, $film_name);

if (!$stmt->execute()) {
    echo json_encode(["error" => "Gagal mengambil data kursi: " . $stmt->error]);
    exit;
}

$result = $stmt->get_result();
$occupiedSeats = [];

while ($row = $result->fetch_assoc()) {
    $occupiedSeats[] = $row['seat_number'];
}

// Kembalikan respons dalam format JSON
echo json_encode(["success" => true, "occupiedSeats" => $occupiedSeats]);
?>
