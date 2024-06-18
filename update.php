<?php
session_start();
include('config.php');

if ($_SESSION['role'] != 1) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $type = $_POST['type'];
    $title = $_POST['judul'];
    $article = $_POST['artikel'];
    $link = isset($_POST['link']) ? $_POST['link'] : '';

    if ($type == 'destination') {
        $updateQuery = "UPDATE tbl_destination SET judul=?, artikel=? WHERE id=?";
        $stmt = $conn->prepare($updateQuery);
        $stmt->bind_param('ssi', $title, $article, $id);
    } else if ($type == 'article') {
        $updateQuery = "UPDATE tbl_artikel SET judul=?, artikel=?, link=? WHERE id=?";
        $stmt = $conn->prepare($updateQuery);
        $stmt->bind_param('sssi', $title, $article, $link, $id);
    }

    if ($stmt->execute()) {
        header("Location: admin.php");
        exit();
    } else {
        echo 'Error updating record: ' . $conn->error;
    }
}
?>
