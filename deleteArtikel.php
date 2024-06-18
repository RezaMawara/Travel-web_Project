<?php
require 'config.php';

// Pastikan data yang diterima sesuai
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    // Mengambil ID dari URL
    $id1 = $_GET['id'];

    // Gunakan prepared statement untuk mencegah SQL injection
    $stmt1 = $conn->prepare("DELETE FROM tbl_artikel WHERE id=?");
    $stmt1->bind_param("i", $id1);

    if ($stmt1->execute()) {
        // Mengatur header untuk memberi tahu klien bahwa respons adalah JSON
        header("Location: admin.php");
    } else {
        // Mengatur header untuk memberi tahu klien bahwa respons adalah JSON
        header('Content-Type: application/json');
        // Kirim respons JSON
        echo json_encode(array("status" => "error", "message" => "Failed to delete"));
    }
    // Tutup statement
    $stmt1->close();
} else {
    // Mengatur header untuk memberi tahu klien bahwa respons adalah JSON
    header('Content-Type: application/json');
    // Kirim respons JSON
    echo json_encode(array("status" => "error", "message" => "Invalid request"));
}
?>
