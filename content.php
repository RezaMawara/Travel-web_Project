<?php

session_start();
include('config.php');
if ($_SESSION['role'] != 1) {
    header("Location: login.php");
    exit();
}
$query1 = "SELECT * FROM tbl_destination";
$result1= $conn->query($query1);

$query = "SELECT * FROM tbl_artikel";
$result = $conn->query($query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/admin.css">
    <title>Traveler</title>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="admin.php" class="logo">
            <div class="logo-name"><span>Tra</span>veler</div>
        </a>
        <ul class="side-menu">
            <li><a href="admin.php"><i class='bx bxs-dashboard'></i>Dashboard</a></li>
            <li><a href="content.php"><i class='bx bx-message-square-dots'></i>Content</a></li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="login.php" class="logout">
                    <i class='bx bx-log-out-circle'></i>
                    Logout
                </a>
            </li>
        </ul>
    </div>
    <!-- End of Sidebar -->

    <!-- Main Content -->
    <div class="content">
        <!-- Navbar -->
        <nav>
            <i class='bx bx-menu'></i>
            <form action="#" method="post" enctype="multipart/form-data">
                <div class="form-input">
                    <button class="search-btn" type="submit"></button>
                </div>
                </form>
            <input type="checkbox" id="theme-toggle" hidden>
            <label for="theme-toggle" class="theme-toggle"></label>
            <a href="#" class="profile">
                <img src="images/FotoDaffa_BackgroundBiru.jpg">
            </a>
        </nav>

        <!-- End of Navbar -->

        <main>
            <div class="header">
                <div class="left">
                    <h1>Content</h1>
                    </ul>
                </div>
            </div>

            <div class="bottom-data">
    <div class="orders">
        <div class="header">
            <i class='bx bx-receipt'></i>
            <h3>Add Destination</h3>
                <table>
                    <tbody>
                        <tr>
                        <form method="post" action="submit.php" enctype="multipart/form-data">
                            <td>Photo</td>
                            <td class="custom-file-upload">
                                <input type="file" name="gambar" id="gambar" />
                                <label for="gambar">Choose File</label>
                            </td>
                        </tr>
                        <tr>
                            <td>Title</td>
                            <td><textarea type="text" name="judul" placeholder="Write you title ..." style="width:800px; height:300px;"></textarea></td>
                        </tr>
                        <tr>
                            <td>Article</td>
                            <td><textarea type="text" name="artikel" placeholder="Write you article ..." style="width:800px; height:300px;"></textarea></td>
                        </tr>
                        <tr>
                            <td><button type="submit" name="submit_destination" class="custom-submit-button">Submit</button></td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>

<!-- Form for adding articles -->
<div class="bottom-data">
    <div class="orders">
        <div class="header">
            <i class='bx bx-receipt'></i>
            <h3>Add Article</h3>
                <table>
                    <tbody>
                        <tr>
                        <form method="post" action="submit.php" enctype="multipart/form-data">
                            <td>Photo</td>
                            <td class="custom-file-upload">
                                <input type="file" name="gambar" id="gambar1" />
                                <label for="gambar1">Choose File</label>
                            </td>
                        </tr>
                        <tr>
                            <td>Title</td>
                            <td><textarea type="text" name="judul1" placeholder="Write you title ..." style="width:800px; height:300px;"></textarea></td>
                        </tr>
                        <tr>
                            <td>Article</td>
                            <td><textarea type="text" name="artikel1" placeholder="Write you article ..." style="width:800px; height:300px;"></textarea></td>
                        </tr>
                        <tr>
                            <td>Link</td>
                            <td><textarea type="text" name="link1" placeholder="Write you link ..." style="width:800px; height:300px;"></textarea></td>
                        </tr>
                        <tr>
                            <td><button type="submit" name="submit_article" class="custom-submit-button">Submit</button></td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>

        </main>

    </div>

    <script src="js/scriptadmin.js"></script>
</body>
<script>
    function showPopup(message, actionFunction, recipeId) {
        if (confirm(message)) {
            actionFunction(recipeId);
        }
    }

    function handleSubmission(type, recipeId) {
        var message = 'Data telah ditambahkan. Apakah Anda ingin melanjutkan?';
        if (type === 'destination') {
            showPopup(message, updated, recipeId);
        } else if (type === 'article') {
            showPopup(message, updated, recipeId);
        }
    }
</script>
</html>