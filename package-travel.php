<?php
include 'koneksi.php';

$sql = "SELECT * FROM paket";
$query = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!--=============== BOXICONS ===============-->
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

  <!--=============== SWIPER CSS ===============-->
  <link rel="stylesheet" href="./assets/libraries/swiper-bundle.min.css" />

  <!--=============== CSS ===============-->
  <link rel="stylesheet" href="assets/css/style.css" />
  <link rel="stylesheet" href="assets/css/package.css" />
  <style>
  .transparent-img {
    filter: grayscale(100%);
    opacity: 0.5;
  }

  .popular__card {
    position: relative;
  }

  .sold-out-overlay {
    position: absolute;
    top: 10px;
    right: 10px;
    background-color: rgba(255, 0, 0, 0.7);
    color: white;
    padding: 5px 10px;
    font-style: italic;
    font-weight: bold;
    border-radius: 5px;
    z-index: 10;
  }
  </style>
  <title>Package Travel</title>
</head>

<body>
  <!--==================== HEADER ====================-->
  <header class="header" id="header">
    <nav class="nav container">
      <a href="#home" class="nav__logo">ACALA BR<i class="bx bxs-map"></i>MO</a>

      <div class="nav__menu">
        <ul class="nav__list">
          <li class="nav__item">
            <a href="index.html" class="nav__link">
              <i class="bx bx-home-alt"></i>
              <span>Home</span>
            </a>
          </li>
          <li class="nav__item">
            <a href="package-travel.php" class="nav__link active-link">
              <i class="bx bx-building-house"></i>
              <span>Package Travel</span>
            </a>
          </li>
          <li class="nav__item">
            <a href="blog.php" class="nav__link">
              <i class="bx bx-award"></i>
              <span>Blog</span>
            </a>
          </li>
          <li class="nav__item">
            <a href="contact.php" class="nav__link">
              <i class="bx bx-phone"></i>
              <span>Contact</span>
            </a>
          </li>
        </ul>
      </div>

      <!-- theme -->
      <i class="bx bx-moon change-theme" id="theme-button"></i>

      <a href="login.php" class="button nav__button">Admin</a>
    </nav>
  </header>

  <!--==================== MAIN ====================-->
  <main class="main">
    <!--==================== HOME ====================-->
    <section>
      <div class="swiper-container gallery-top">
        <div class="swiper-wrapper">
          <section class="islands swiper-slide">
            <img src="./assets/img/bromo1.jpg" alt="" class="islands__bg" />

            <div class="islands__container container">
              <div class="islands__data">
                <h1 class="islands__title">Package Travel</h1>
              </div>
            </div>
          </section>
        </div>
      </div>
    </section>

    <!--==================== POPULAR ====================-->
    <section class="section" id="popular">
      <div class="container">
        <h2 class="section__title" style="text-align: center">
          With Our Experience </br> We Will Serve You </h2></br>

        <!---========== Text and image layout=======-->
        <div class="custom-container">
          <!-- Center Text -->
          <div class="center-text">
            <div class="text-block">
              <p class="large-text">6</p>
              <p class="small-text">Year Experience</p>
            </div>
            <div class="text-block">
              <p class="large-text">+950</p>
              <p class="small-text">Complete Tours</p>
            </div>
            <div class="text-block">
              <p class="large-text">6</p>
              <p class="small-text">Destination</p>
            </div>
          </div>
          <!-- Image Row -->
          <div class="image-row">
            <!-- Left Portrait Image -->
            <div class="left-column">
              <img src="assets/img/p1.png" alt="Left Portrait Image" class="custom-image">
            </div>
            <!-- Right Portrait Image -->
            <div class="right-column">
              <img src="assets/img/p2.png" alt="Right Portrait Image" class="custom-image">
              <img src="assets/img/p3.png" alt="Bottom Portrait Image" class="custom-image image-spacing">
            </div>
          </div>

          <!--================ PACKAGE =======================-->
        <h2 class="section__title" style="text-align: center">Choose Your Package</h2>
          <div class="popular__all">
          <?php 
            while ($row = mysqli_fetch_assoc($query)){
              $tanggal_sekarang = date("Y-m-d");
              $isDisabled = $row['stok'] == 0 || $row['tanggal_paket'] <= $tanggal_sekarang;
              $imgClass = $isDisabled ? 'transparent-img' : '';
              $buttonDisabled = $isDisabled ? 'disabled' : '';
              ?>
              <article class="popular__card">
                <?php if ($isDisabled): ?>
                  <div class="sold-out-overlay">Sold</div>
                <?php endif; ?>
              <img src="assets/img/jeep.png" alt="" class="popular__img <?= $imgClass ?>" />
                <div class=""popular__data>
                  <h2 class="popular__price"><span>Rp </span><?= number_format($row['harga_paket'], 0, '.', '.')?>,-</h2>
                  <h3 class="popular__title"><?= $row['nama_paket'] ?> | <?= $row['tanggal_paket'] ?></h3>
                    <p class="popular__description"><?= $row['deskripsi_singkat'] ?></p><br>
                  </div>
                  <?php if (!$isDisabled): ?>
                    <a href="detail-package.php?id_paket=<?= $row['id_paket'] ?>">
                      <button type="button" class="btn btn-outline-primary">Pesan</button>
                    </a>
                  <?php else: ?>
                    <button type="button" class="btn btn-outline-primary" disabled>Pesan</button>
                  <?php endif; ?>
              </article>
            <?php
            }
            ?>
            </div>
          </div>
        </div>
      </section>
    </main>

  <!--==================== FOOTER ====================-->
  <footer class="footer section">
    <div class="footer__container container grid">
      <div>
        <a href="#" class="footer__logo">
          ACALA BR<i class="bx bxs-map"></i>MO
        </a>
        <p class="footer__description">
          Our vision is to provide the best travel experiences <br>
          in Bromo and unforgettable adventures.
        </p>
      </div>

      <div class="footer__content">
        <div>
          <h3 class="footer__title">About</h3>

          <ul class="footer__links">
            <li>
              <a href="#" class="footer__link">About Us</a>
            </li>
            <li>
              <a href="#" class="footer__link">Features </a>
            </li>
            <li>
              <a href="#" class="footer__link">News & Blog</a>
            </li>
          </ul>
        </div>
        <div>
          <h3 class="footer__title">Company</h3>

          <ul class="footer__links">
            <li>
              <a href="#" class="footer__link">How We Work? </a>
            </li>
            <li>
              <a href="#" class="footer__link">Capital </a>
            </li>
            <li>
              <a href="#" class="footer__link"> Security</a>
            </li>
          </ul>
        </div>
        <div>
          <h3 class="footer__title">Support</h3>

          <ul class="footer__links">
            <li>
              <a href="#" class="footer__link">FAQs </a>
            </li>
            <li>
              <a href="#" class="footer__link">Support center </a>
            </li>
            <li>
              <a href="#" class="footer__link"> Contact Us</a>
            </li>
          </ul>
        </div>
        <div>
          <h3 class="footer__title">Follow us</h3>

          <ul class="footer__social">
            <a href="#" class="footer__social-link">
              <i class="bx bxl-facebook-circle"></i>
            </a>
            <a href="#" class="footer__social-link">
              <i class="bx bxl-instagram-alt"></i>
            </a>
            <a href="#" class="footer__social-link">
              <i class="bx bxl-pinterest"></i>
            </a>
          </ul>
        </div>
      </div>
    </div>

    <div class="footer__info container">
      <span class="footer__copy"> &#169; Acala Bromo. All rigths reserved </span>
      <div class="footer__privacy">
        <a href="#">Terms & Agreements</a>
        <a href="#">Privacy Policy</a>
      </div>
    </div>
  </footer>

  <!--========== SCROLL UP ==========-->
  <a href="#" class="scrollup" id="scroll-up">
    <i class="bx bx-chevrons-up"></i>
  </a>

  <!--=============== SCROLLREVEAL ===============-->
  <script src="./assets/libraries/scrollreveal.min.js"></script>

  <!--=============== SWIPER JS ===============-->
  <script src="./assets/libraries/swiper-bundle.min.js"></script>

  <!--=============== MAIN JS ===============-->
  <script src="./assets/js/main.js"></script>
</body>

</html>