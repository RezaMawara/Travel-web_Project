<?php
session_start();
include('config.php');
if ($_SESSION['role'] != 0) {
    header("Location: login.php");
    exit();
}
$query1 = "SELECT * FROM tbl_destination";
$result1= $conn->query($query1);
$query = "SELECT * FROM tbl_artikel";
$result = $conn->query($query);

$query_latest = "SELECT * FROM tbl_destination ORDER BY id DESC LIMIT 1";
$result_latest = $conn->query($query_latest);
$latest_destination = $result_latest->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/all.min.css" />
  <title>trasul</title>
</head>

<body>
  <div id="scroll-top-btn"><i class="fa-solid fa-arrow-up"></i></div>
  <header>
    <div class="container">
      <div class="logo" id="top">
        <div><a href="index.html">trasul</a></div>
      </div>
      <ul id="click-menu">
        <li><a href="">home</a></li>
        <li><a href="#category">Destination</a></li>
        <li><a href="#new">update</a></li>
        <li><a href="#page">article</a></li>
        <li><a href="#archive">archive</a></li>
        <li><a href="#about us">about us</a></li>
        <li><a href="login.php" class="logout">
          <i class='bx bx-log-out-circle'></i>Logout</a>
        </li>
      </ul>
      <div class="bar">
        <div></div>
      </div>
    </div>
  </header>
  <!-- end header -->
  <!-- start hero -->
  <div class="hero">
    <div class="container">
      <h4>welcome trasul</h4>
      <h1>find what you want in Sulawesi</h1>
      <p>Find the place you’ve always wanted to visit. Whether you’re looking for relaxation or excitement, 
        our platform offers a wealth of helpful information for trasul. Explore stunning destinations, 
        experience local culture, and create unforgettable memories. Let us guide you on your journey to the perfect vacation, 
        making sure every moment is exactly as you imagined. Enjoy the journey and find your dream vacation with us.</p>
    </div>
  </div>
  <!-- end hero -->
  <!-- start category -->
  <div class="category" id="category">
    <h2 class="shape">Destination</h2>
    <div class="container">
        <?php while ($row1 = $result1->fetch_assoc()): ?>
        <div class="card">
            <div class="imgs">
                <img src="images/<?php echo htmlspecialchars($row1['foto']); ?>" alt="new_place">
            </div>
            <div class="detalis">
                <span><?php echo htmlspecialchars($row1['judul']); ?></span>
                <p><?php echo nl2br(htmlspecialchars($row1['artikel'])); ?></p>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>
<!-- end category -->

<!-- start update -->
<div class="update" id="new">
    <h2 class="shape">update</h2>
    <div class="container">
        <?php if ($latest_destination): ?>
        <img src="images/<?php echo htmlspecialchars($latest_destination['foto']); ?>" alt="new-place">
        <div class="detalis">
            <span><?php echo htmlspecialchars($latest_destination['judul']); ?></span>
            <p><?php echo nl2br(htmlspecialchars($latest_destination['artikel'])); ?></p>
        </div>
        <?php else: ?>
        <p>No New Destinations.</p>
        <?php endif; ?>
    </div>
</div>
  <!-- end update -->
  <div class="page" id="page">
    <h2 class="shape">article</h2>
    <div class="container">
        <div class="container-card">
            <?php 
            $counter = 0; // Inisialisasi penghitung
            while ($row = $result->fetch_assoc()): 
                $counter++;
                if ($counter <= 4): 
            ?>
            <div class="card">
                <div class="imgs">
                    <img src="images/<?php echo htmlspecialchars($row['foto']); ?>" alt="background-image">
                </div>
                <h2><?php echo htmlspecialchars($row['judul']); ?></h2>
                <p><?php echo nl2br(htmlspecialchars($row['artikel'])); ?></p>
                <button><a href="<?php echo htmlspecialchars($row['link']); ?>">Read More</a></button>
            </div>
            <?php 
                else: 
                    if ($counter == 5): // Tampilkan judul arsip saat artikel ke-5 dimulai
            ?>
            </div> <!-- Tutup .container-card -->
            <div class="container-side">
                <div class="sort-by">
                    <div class="logo-side">
                    </div>
                    <div class="container-side-card">
                        <h2 id="archive">archive</h2>
            <?php endif; ?>
            <div class="card">
                <a href="<?php echo htmlspecialchars($row['link']); ?>">
                    <img src="images/<?php echo htmlspecialchars($row['foto']); ?>" alt="place">
                    <p><?php echo htmlspecialchars($row['judul']); ?></p>
                    <span><?php echo nl2br(htmlspecialchars(substr($row['artikel'], 0, 100))); ?>...</span>
                </a>
            </div>
            <?php endif; ?>
            <?php endwhile; ?>
            <?php if ($counter > 4): // Tutup div jika ada artikel di archive ?>
                    </div> <!-- Tutup .container-side-card -->
                </div> <!-- Tutup .sort-by -->
            </div> <!-- Tutup .container-side -->
            <?php endif; ?>
        </div> <!-- Tutup .container-card -->
    </div> <!-- Tutup .container -->
</div> <!-- Tutup .page -->

  <!-- start page -->
  <!-- start about us -->
  <div class="about-us" id="about us">
    <h2 class="shape">about us</h2>
    <div class="blog-content">
      <div class="card-container">
        <div class="card">
          <div class="imgs">
            <img src="images/Fotodaffa_nobackground.png" alt="new_place">
          </div>
          <div class="detalis">
            <h2>Daffa Nur Fiat</h2>
            <article>Haii, namaku Daffa, seorang mahasiswa informatika yang sehari-hari bergelut dengan kode dan algoritma. 
              Meski terlihat sibuk, jangan salah, aku ini bucin berat. Tiap kali bertemu kamu, 
              aku merasa seperti menemukan bug yang selama ini kucari—sebab dengan memilikimu, 
              hidupku jadi sempurna tanpa perlu debug lagi.</article>
            <div class="btns">
            </div>
          </div>
        </div>
        <div class="card">
          <div class="imgs">
            <img src="images/echaa.png" alt="new_place">
          </div>
          <div class="detalis">
            <h2>Reza Michelly Cantika Mawara</h2>
            <article>Haii, nama panggilanku Echa, seorang mahasiswa informatika yang sering kali tenggelam dalam dunia kode dan algoritma. 
              Saking sibuknya, kadang aku sampai lupa makan. Tapi anehnya, tiap kali melihat senyummu, aku merasa kenyang seketika, 
              seolah-olah cinta darimu adalah sumber energi terbaik yang pernah ada.</article>
            <div class="btns">
            </div>
          </div>
        </div>
        <div class="card">
          <div class="imgs">
            <img src="images/selvi .png" alt="new_place">
          </div>
          <div class="detalis">
            <h2>Selviana Wulandari</h2>
            <article>Halo, aku biasa dipanggil Selvi, seorang mahasiswa informatika yang sehari-harinya sibuk 
              mengutak-atik kode dan mengejar deadline tugas. Di tengah hiruk-pikuk algoritma dan struktur data, 
              ada satu hal yang selalu menjadi variabel konstan dalam hidupku, yaitu kekagumanku pada senyummu 
              yang bisa membuat dunia seakan berhenti sejenak.</article>
            <div class="btns">
            </div>
          </div>
        </div>
        <div class="card">
          <div class="imgs">
            <img src="images/flowrence.png" alt="new_place">
          </div>
          <div class="detalis">
            <h2>Florence Lowing</h2>
            <article>Halo, aku Florence, seorang mahasiswa informatika yang lebih sering berinteraksi dengan komputer daripada manusia. 
              Tapi meski sibuk dengan kode dan tugas, pacarku selalu jadi prioritas utama dan selalu ada di depan. Karena bagiku, 
              seperti program yang tak akan berjalan tanpa sintaks yang benar, hidupku juga tak akan sempurna tanpa kehadiranmu yang 
              selalu membuat hatiku berfungsi sempurna.</article>
            <div class="btns">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end about us -->
  
  <footer>
    <div class="footer-container">
      <div class="card">
        <div class="title">trasul</div>
        <p>Find the place you’ve always wanted to visit. Whether you’re looking for relaxation or excitement, 
          our platform offers a wealth of helpful information for trasul. Explore stunning destinations, 
          experience local culture, and create unforgettable memories. Let us guide you on your journey to the perfect vacation, 
          making sure every moment is exactly as you imagined. Enjoy the journey and find your dream vacation with us.</p>
      </div>
      <div class="card">
        <div class="title">Menu</div>
        <ul>
          <li><a href="">home</a></li>
          <li><a href="#category">Destination</a></li>
          <li><a href="#new">update</a></li>
          <li><a href="#page">article</a></li>
          <li><a href="#archive">archive</a></li>
          <li><a href="#about us">about us</a></li>
        </ul>
      </div>
      <div class="card">
        <div class="title">About us</div>
        <ul>
          <li><a href=""><i class="fa-solid fa-calendar-days"></i> made in, 2024</a></li>
          <li><a href="#"><i class="fa-solid fa-globe"></i> Indonesia</a></li>
          <li><a href="#"><i class="fa-solid fa-city"></i> Sulawesi Utara, Manado</a></li>
          <li><a href="#"><i class="fa-solid fa-phone"></i> +62895802929397</a></li>
        </ul>
      </div>
    </div>
  </footer>
  <script src="js/script.js"></script>
</body>

</html>