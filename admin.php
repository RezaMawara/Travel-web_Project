<?php

session_start();
include('config.php');
if ($_SESSION['role'] != 1) {
    header("Location: login.php");
    exit();
}
$query1 = "SELECT * FROM tbl_destination";
$result1= $conn->query($query1);
$total_destinations = $result1->num_rows;
$query = "SELECT * FROM tbl_artikel";
$result = $conn->query($query);
$total_articles = $result->num_rows;
$query2 = "SELECT * FROM tbl_user";
$result2 = $conn->query($query2);
$total_users = $result2->num_rows;

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
            <form action="#">
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
                    <h1>Dashboard</h1>
                    </ul>
                </div>
            </div>

            <!-- Insights -->
            <ul class="insights">
                <li>
                    <i class='bx bx bxs-plane-alt'></i>
                    <span class="info">
                        <h3>
                            <?php echo $total_destinations; ?>
                        </h3>
                        <p>Total Destination</p>
                    </span>
                </li>
                <li><i class='bx bx-receipt'></i>
                    <span class="info">
                        <h3>
                            <?php echo $total_articles; ?>
                        </h3>
                        <p>Total Article</p>
                    </span>
                </li>
                <li><i class='bx bx-user'></i>
                    <span class="info">
                        <h3>
                            <?php echo $total_users; ?>
                        </h3>
                        <p>Total Users</p>
                    </span>
                </li>
            </ul>
            <!-- End of Insights -->

            <div class="bottom-data">
                <div class="orders">
                    <div class="header">
                        <i class='bx bxs-plane-alt'></i>
                        <h3>Destination</h3>
                        <a href='content.php' class='bx bx-plus'></a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Title</th>
                                <th>Article</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php while ($row1 = $result1->fetch_assoc()): ?>
                            <tr>
                                <td><img src="images/<?php echo $row1['foto']; ?>" alt="Destination Photo"></td>
                                <td>
                                    <?php echo $row1['judul']; ?>
                                </td>
                                <td>
                                    <?php echo $row1['artikel']; ?>
                                </td>
                                <td>
                                    <button class="delete-button"
                                        onclick="deleteddestination(<?php echo $row1['id']; ?>)">Delete</button>
                                </td>
                                <td>
                                    <button class="button-edit"
                                        onclick="location.href='edit.php?type=destination&id=<?php echo $row1['id']; ?>'">Edit</button>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>

                <div class="bottom-data">
                    <div class="orders">
                        <div class="header">
                            <i class='bx bx-receipt'></i>
                            <h3>Article</h3>
                            <a href='content.php' class='bx bx-plus'></a>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Title</th>
                                    <th>Article</th>
                                    <th>Link</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php while ($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><img src="images/<?php echo $row['foto']; ?>" alt="Article Photo"></td>
                                    <td>
                                        <?php echo $row['judul']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['artikel']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['link']; ?>
                                    </td>
                                    <td>
                                        <button class="delete-button"
                                            onclick="deletedartikel(<?php echo $row['id']; ?>)">Delete</button>
                                    </td>
                                    <td>
                                        <button class="button-edit"
                                            onclick="location.href='edit.php?type=article&id=<?php echo $row['id']; ?>'">Edit</button>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
        </main>
    </div>
    <script src="js/scriptadmin.js"></script>
</body>
<script>

    function deleteddestination(recipeId) {
        if (confirm('Apakah Anda yakin ingin menghapus destination ini?')) {
            // Redirect ke file delete dengan ID resep
            window.location.href = 'deleteDestination.php?id=' + recipeId;
        }
    }
    function deletedartikel(recipeId) {
        if (confirm('Apakah Anda yakin ingin menghapus artikel ini?')) {
            // Redirect ke file delete dengan ID resep
            window.location.href = 'deleteArtikel.php?id=' + recipeId;
        }
    }
</script>

</html>