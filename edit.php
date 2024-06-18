<?php
session_start();
include('config.php');

// Cek apakah user memiliki hak akses
if ($_SESSION['role'] != 1) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];
$type = $_GET['type'];

if ($type == 'destination') {
    $query = "SELECT * FROM tbl_destination WHERE id = ?";
} else if ($type == 'article') {
    $query = "SELECT * FROM tbl_artikel WHERE id = ?";
}

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/edit.css">
    <title>Edit <?php echo ucfirst($type); ?></title>
</head>
<body>
    <div class="container">
        <h2>Edit <?php echo ucfirst($type); ?></h2>
        <form action="update.php" method="post">
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
            <input type="hidden" name="type" value="<?php echo $type; ?>">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="judul" id="title" value="<?php echo htmlspecialchars($data['judul']); ?>" required>
            </div>
            <div class="form-group">
                <label for="article">Article:</label>
                <textarea name="artikel" id="article" style="height: 200px;" required><?php echo htmlspecialchars($data['artikel']); ?></textarea>
            </div>
            <?php if ($type == 'article'): ?>
                <div class="form-group">
                    <label for="link">Link:</label>
                    <input type="text" name="link" id="link" value="<?php echo htmlspecialchars($data['link']); ?>">
                </div>
            <?php endif; ?>
            <button type="submit">Save Changes</button>
        </form>
        <a href="admin.php">Cancel</a>
    </div>
</body>
</html>
