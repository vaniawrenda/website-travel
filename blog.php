<?php
include 'koneksi.php';
$sql = "SELECT * FROM event";
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
  <link rel="stylesheet" href="./assets/css/style.css" />
  <link rel="stylesheet" href="./assets/css/blog.css" />
  <title>Blog</title>
  <style>
    .event-grid {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }

    .event-item {
      width: 400px;
      height: auto;
      margin: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      transition: transform 0.3s ease;
    }


    .event-item:hover {
      transform: translateY(-5px);  
    }

    .event-item__image {
      width: 400%;
      height: auto;
      object-fit: cover;
    }

    .event-item__content {
      padding: 20px;
    }

  .event-item__title {
    margin-top: 0;
    margin-bottom: 10px;
  }

  .event-item__date {
    margin-bottom: 10px;
  }

  .event-item__description {
    margin-bottom: 0;
    text-align: justify;
  }



</style>

  </style>
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
            <a href="package-travel.php" class="nav__link">
              <i class="bx bx-building-house"></i>
              <span>Package Travel</span>
            </a>
          </li>
          <li class="nav__item">
            <a href="blog.php" class="nav__link active-link">
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
            <img src="assets/img/bromo4.jpg" alt="" class="islands__bg" />

            <div class="islands__container container">
              <div class="islands__data">
                <h2 class="islands__subtitle">our</h2>
                <h1 class="islands__title">BLOG</h1>
              </div>
            </div>
          </section>
        </div>
      </div>
    </section>

    <!-- blog -->
    <section class="blog section" id="blog">
      <div class="blog__container container">
        <h2 class="section__title" style="text-align: center">Gunung Bromo</h2>
        <!-- GUNUNG BROMO 1 -->
        <div class="blog__bromo container">
          <div class="row">
            <div class="left-column">
              <img src="assets/img/bromo2.jpg" alt="Left Portrait Image" class="custom-image">
            </div>
            <div class="left-column">
              <p>
                Gunung Bromo merupakan salah satu ikon wisata Indonesia yang terletak di Jawa Timur, tepatnya berada di kawasan Taman Nasional Bromo Tengger Semeru. 
                Gunung Bromo merupakan salah satu gunung berapi paling aktif di Indonesia dengan daya tarik utamanya adalah kawah yang spektakuler yang terus menerus melepaskan asap putih yang tebal.
                Selain itu, di kawasan Taman Nasional Bromo Tengger Semeru, terdapat juga Bukit Teletubbies yang terkenal 
                dengan padang rumput hijau yang luas dan indah. Pemandangan yang serba hijau ini memberikan kontras yang menakjubkan dengan lautan pasir dan gunung berapi di sekitarnya. Salah satu 
                momen yang paling dicari adalah menyaksikan matahari terbit dari Bukit Penanjakan, yang menawarkan pemandangan indah gunung Bromo, gunung Batok, gunung Semeru, dan lautan pasir yang luas. 
              </p>
            </div>
          </div>
        </div>
        <!-- GUNUNG BROMO 2 -->
        <div class="blog__bromo container">
          <div class="row">
            <div class="right-left">
              <p>
              Selain itu, pengunjung juga dapat melakukan treking ke kawah gunung Bromo. 
              Perjalanan dimulai dari area parkir di dekat gunung dan berlanjut dengan menaiki tangga ke kawah, 
              di mana pengunjung dapat merasakan keindahan alam yang luar biasa. Di sekitar kawah, 
              terdapat lautan pasir yang menakjubkan yang juga bisa dieksplorasi dengan berjalan kaki atau naik kuda. 
              Bukan hanya keindahan alamnya, wisata Gunung Bromo juga menawarkan pengalaman budaya yang unik karena 
              wilayah sekitarnya dihuni oleh masyarakat Tengger yang memiliki kebudayaan dan adat istiadat yang khas. 
              Para pengunjung dapat menyaksikan upacara adat yang dilakukan oleh masyarakat setempat, 
              seperti Tari Topeng atau ritual persembahan kepada para leluhur. Dengan segala daya tarik alam dan budayanya, 
              Gunung Bromo menjadi salah satu destinasi wisata yang tidak boleh terlewatkan. Dari petualangan yang menegangkan 
              hingga keindahan alam yang menakjubkan, Gunung Bromo menawarkan pengalaman yang tak terlupakan bagi 
              siapa pun yang memilih untuk mengunjunginya.
              </p>
            </div>
            <div class="left-right">
              <img src="assets/img/tanggakawah.jpg" alt="Left Portrait Image" class="custom-image">
            </div>
          </div>
        </div>
        </div>
    </section>

    <!-- EVENT -->
    <section class="blog section" id="blog">
    <div class="blog__container container">
        <span class="section__subtitle" style="text-align: center; display: block; margin-bottom: 20px;">About Event</span>
        <h2 class="section__title" style="text-align: center;">Event In Bromo Now</h2>
    </div>
    <div class="event-grid">
        <?php while ($row = mysqli_fetch_assoc($query)) { ?>
            <article class="event-item">
                <img src="<?= $row['image'] ?>" alt="" class="event-item__image" />
                <div class="event-item__content">
                    <h3 class="event-item__title"><b><?= $row['nama_event'] ?></b></h3>
                    <h4 class="event-item__date"><b>Save The Date: <?= $row['tanggal_event'] ?></b></h4>
                    <p class="event-item__description"><?= $row['deskripsi_event'] ?></p>
                </div>
            </article>
        <?php } ?>
    </div>
</section>





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