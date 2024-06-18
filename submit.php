<?php
session_start();
require 'config.php'; // Menghubungkan ke database

$target_dir = "images/";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle destination submission
    if (isset($_POST['submit_destination'])) {
        $judul = mysqli_real_escape_string($conn, $_POST['judul']);
        $artikel = mysqli_real_escape_string($conn, $_POST['artikel']);

        // Handle file upload
        $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
            $photo = basename($_FILES["gambar"]["name"]);
            $sql = "INSERT INTO tbl_destination (foto, judul, artikel) VALUES ('$photo', '$judul', '$artikel')";
            
            if (mysqli_query($conn, $sql)) {
                header("Location: content.php?status=success&type=destination");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    
    // Handle article submission
    if (isset($_POST['submit_article'])) {
        $judul = mysqli_real_escape_string($conn, $_POST['judul1']);
        $artikel = mysqli_real_escape_string($conn, $_POST['artikel1']);
        $link = mysqli_real_escape_string($conn, $_POST['link1']);

        // Penanganan unggah file untuk artikel
        $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
        if ($_FILES["gambar"]["error"] == 0 && move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
            $photo = basename($_FILES["gambar"]["name"]);
            $sql = "INSERT INTO tbl_artikel (foto, judul, artikel, link) VALUES ('$photo', '$judul', '$artikel', '$link')";
            
            if (mysqli_query($conn, $sql)) {
                header("Location: content.php?status=success&type=article");
                exit();
            } else {
                echo "Kesalahan: " . $sql . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Maaf, terjadi kesalahan saat mengunggah file Anda. Kode kesalahan: " . $_FILES["gambar"]["error"];
        }
    }
}

// Menutup koneksi
mysqli_close($conn);
?>
