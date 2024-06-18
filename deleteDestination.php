<?php
require 'config.php';

// Pastikan data yang diterima sesuai
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    // Mengambil ID dari URL
    $id = $_GET['id'];

    // Gunakan prepared statement untuk mencegah SQL injection
    $stmt = $conn->prepare("DELETE FROM tbl_destination WHERE id=?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Mengatur header untuk memberi tahu klien bahwa respons adalah JSON
        header("Location: admin.php");
    } else {
        // Mengatur header untuk memberi tahu klien bahwa respons adalah JSON
        header('Content-Type: application/json');
        // Kirim respons JSON
        echo json_encode(array("status" => "error", "message" => "Failed to delete"));
    }
    // Tutup statement
    $stmt->close();
} else {
    // Mengatur header untuk memberi tahu klien bahwa respons adalah JSON
    header('Content-Type: application/json');
    // Kirim respons JSON
    echo json_encode(array("status" => "error", "message" => "Invalid request"));
}
?>
