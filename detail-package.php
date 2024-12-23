<?php
// AKSES DATA PAKET YG AKAN DIPESAN
include 'koneksi.php';
$id_paket = $_GET['id_paket'];
$sql = "SELECT * FROM paket WHERE id_paket='$id_paket'";
$query = mysqli_query($koneksi, $sql);
$row = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--=============== BOXICONS ===============-->
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <!--=============== SWIPER CSS ===============-->
    <link rel="stylesheet" href="./assets/libraries/swiper-bundle.min.css" />
    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="./assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/detail-package.css">
    <title>Detail Package</title>
    <script>
      function validateInput(event) {
        var input = event.target;
        var value = input.value;
        var errorMessage = document.getElementById("error-message");

        // Hanya mengizinkan angka
        input.value = value.replace(/[^0-9]/g, '');

        // Menampilkan pesan kesalahan jika panjang kurang dari 11 atau lebih dari 13
        if (input.value.length > 13) {
          errorMessage.textContent = "Nomor telepon hanya boleh maksimal 13 angka.";
        } else if (input.value.length < 11) {
          errorMessage.textContent = "Nomor telepon minimal 11 angka.";
        } else {
          errorMessage.textContent = "";
        }
      }

    </script>
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
            <!--========== PAKET  ==========-->
            <section class="islands swiper-slide">
              <img src="./assets/img/jeep.png" alt="" class="islands__bg" />

              <div class="islands__container container">
                <div class="islands__data">
                  <h1 class="islands__title"><?= $row['nama_paket'] ?></h1>
                </div>
              </div>
            </section>

        <!--========== CONTROLS ==========-->
        <div class="controls gallery-thumbs">
          <div class="controls__container swiper-wrapper">
            <img
              src="./assets/img/jeep.png"
              alt=""
              class="controls__img swiper-slide"
            />
            <img
              src="./assets/img/jeepicon1.jpeg"
              alt=""
              class="controls__img swiper-slide"
            />
            <img
              src="./assets/img/login.jpeg"
              alt=""
              class="controls__img swiper-slide"
            />
          </div>
        </div>
      </section>

      <!-- DETAIL PAKET -->
      <section class="blog section" id="blog">
        <div class="blog__container container">
            <div class="content__container">
                <div class="blog__detail">
                    <h2 class="blog__title">Detail Paket</h2>
                    <table class="detail-table">
                        <tr>
                            <td><b>Harga</b></td>
                            <td>:</td>
                            <?php
                            if ($row['jenis_paket'] == 'open'){?>
                              <td>Rp <?= number_format($row['harga_paket'], 0, '.', '.') ?>,-/Orang</td>
                            <?php
                            }else{?>
                              <td>Rp <?= number_format($row['harga_paket'], 0, '.', '.') ?>,-/Group</td>
                            <?php
                            }
                            ?>
                            
                        </tr>
                        <tr>
                            <td><b>Tanggal</b></td>
                            <td>:</td>
                            <td><?= $row['tanggal_paket'] ?></td>
                        </tr>
                        <tr>
                            <td><b>Stok</b></td>
                            <td>:</td>
                            <?php 
                            if ($row['jenis_paket'] == 'open'){ ?>
                                <td><?= $row['stok'] ?> Kursi</td>
                            <?php
                            }else{?>
                              <td><?= $row['stok'] ?> Jeep</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td><b>Fasilitas</b></td>
                            <td>:</td>
                            <td><?php
                            $deskripsi = explode(',', $row["deskripsi_paket"]);
                              foreach($deskripsi as $desc){
                              echo "<li>$desc</li>";
                              } ?></td>
                        </tr>
                    </table>

                    <!-- MAPS -->
                    <div class="map-container">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1919.776032603704!2d112.59074861383432!3d-7.888852648362186!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e788339075e6521%3A0x7603cbd0a123f30a!2sAcala%20Bromo%20(%20Sewa%20Jeep%20Bromo%20Semeru%20)!5e0!3m2!1sen!2sus!4v1716036180247!5m2!1sen!2sus" 
                            class="map" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            <!-- BOOKING -->
            <div class="package-travel">
            <h3 style="text-align: center;">Booking Now</h3>
              <div class="card">
                <form action="" method="POST">
                  
                  <input type="text" name="nama" placeholder="Nama" required />
                  <input type="email" name="email" placeholder="Email" required />
                  <input type="tel" name="hp" placeholder="No.Telp/WhatsApp" maxlength="13" pattern="\d{11,13}" required oninput="validateInput(event)" />
                  <span id="error-message" style="color:red;"></span>
                  <input list="point" name="point" id="meet" placeholder="Point Penjemputan" required>
                    <datalist id="point">
                        <option value="Stasiun Kotalama">
                        <option value="Stasiun Kota Baru">
                        <option value="Stasiun Lawang">
                        <option value="Stasiun Kepanjen">
                        <option value="Hotel">
                        <option value="Home Stay">
                    </datalist>
                  <input type="number" name="jml" placeholder="Jumlah Pesanan" required/>
                  <?php
                  if($row['jenis_paket'] == 'open'){?>
                      <input type="text" name="harga" value="Rp <?= number_format($row['harga_paket'], 0, '.', '.') ?>,-/Orang" readonly>
                  <?php
                  }else{?>
                      <input type="text" name="harga" value="Rp <?= number_format($row['harga_paket'], 0, '.', '.') ?>,-/Group" readonly>
                  <?php
                  }?>
                  <input type="text" name="catatan" placeholder="Catatan" >
                  <button class="button button-booking" name="pesan">Pesan</button>
                </form>
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
    <script>
      let galleryThumbs = new Swiper('.gallery-thumbs', {
        spaceBetween: 0,
        slidesPerView: 0,
      });

      let galleryTop = new Swiper('.gallery-top', {
        effect: 'fade',
        loop: true,

        thumbs: {
          swiper: galleryThumbs,
        },
      });
      
    </script>

    <!--=============== MAIN JS ===============-->
    <script src="./assets/js/main.js"></script>
  </body>
</html>

<?php
if (isset($_POST['pesan'])){
    
  // MEMBUAT ID BOOKING
  $queryID = "SELECT MAX(CAST(SUBSTRING(id_booking, 5) AS SIGNED)) AS max_id
  FROM booking";
  $resultID = mysqli_query($koneksi, $queryID);
  $rowID = mysqli_fetch_assoc($resultID);
  $max_id = $rowID['max_id'];
  // Membuat ID 
  $new_id = "BKG0" . ($max_id + 1);
//   ======================================================
  $id_booking = $new_id;
  $id_paket = $id_paket;
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $hp = $_POST['hp'];
  $point = $_POST['point'];
  $jumlah_pesanan = $_POST['jml'];
  if ($jumlah_pesanan > $row['stok']){
    echo "<script> alert('Maaf Stok tidak cukup') </script>";
    echo "<script> window.location.href='detail-package.php?id_paket=$id_paket'</script>";
  }
  $harga = $row['harga_paket'];
  $jenis_paket = $row['jenis_paket'];
  $total_harga = $jumlah_pesanan * $harga;
  $catatan = $_POST['catatan'];

  // QUERY DATA BOOKING
  $sql2 = "INSERT INTO booking VALUES ('$id_booking', '$id_paket', '$nama', '$email', '$hp','$row[tanggal_paket]', '$point', '$jumlah_pesanan', '$total_harga', '$catatan', 'belum bayar')";
  $query2 = mysqli_query($koneksi, $sql2);
  
  if($query2){
  //   header("Location: midtrans/examples/snap/checkout-process-simple-version.php?id_booking=$id_booking");
    echo "<script> alert('Booking Berhasil') </script>";
    echo "<script> window.location.href='midtrans/examples/snap/checkout-process-simple-version.php?id_booking=$id_booking' </script>";
  }else {
    echo "<script> alert('Booking Gagal') </script>";
  }
}

?>