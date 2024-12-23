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

    <title>Contact</title>
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
                        <a href="blog.php" class="nav__link">
                            <i class="bx bx-award"></i>
                            <span>Blog</span>
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="contact.php" class="nav__link active-link">
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
                    <!--========== ISLANDS 1 ==========-->
                    <section class="islands swiper-slide">
                        <img src="assets/img/contact.jpg" alt="" class="islands__bg" />
                        <div class="bg__overlay">
                            <div class="islands__container container">
                                <div class="islands__data">
                                    <h2 class="islands__subtitle">
                                        Need Travel
                                    </h2>
                                    <h1 class="islands__title">
                                        Contact Us
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section>

        <!-- contact -->
        <!--==================== CONTACT ====================-->
        <section class="contact section" id="contact">
            <div class="contact__container container grid">
                <div class="contact__images">
                    <div class="contact__orbe"></div>

                    <div class="contact__img">
                        <img src="assets/img/bromo4.jpg" alt="" />
                        <p style="position: absolute; text-align: justify; left: 0; right: 0; margin: 0 auto; width: 90%; font-size: 
                        18px; padding: 10px;  border-radius: 5px ">Acala Bromo, travel pilihan untuk petualangan tak terlupakan. 
                        Temukan keajaiban alam yang memikat, nikmati pesona gunung berapi Bromo, dan rasakan momen indah
                        yang hanya bisa ditemukan di sini. Dengan pemandangan yang memukau dan layanan berkualitas, 
                        Acala Bromo siap membawa Anda pada petualangan yang luar biasa dan tak terlupakan.</p>
                    </div>
                </div>
                <div class="contact__content">
                    <div class="contact__data">
                        <span class="section__subtitle">Need Help</span>
                        <h2 class="section__title">
                            Jangan ragu untuk menghubungi kami
                        </h2>
                        <p class="contact__description">
                            Apakah ada masalah dalam mencari Travel ke Bromo?
                            Memerlukan panduan dalam perjalanan atau 
                            butuh konsultasi tentang bepergian? Cukup hubungi kami.
                        </p>
                    </div>
                    <!-- CONCTACT SOSMED -->
                    <div class="contact__card">
                        <!-- WHATSAPP -->
                        <div class="contact__card-box">
                            <div class="contact__card-info">
                                <i class="bx bxl-whatsapp"></i>
                                <div>
                                    <h3 class="contact__card-title">Whatsapp</h3>
                                </div>
                            </div>
                            <a href="https://wa.me/6282232237501" target="_blank">
                                <button class="button contact__card-button">Chat Now</button>
                            </a>
                        </div>
                        <!-- INSTAGRAM -->
                        <div class="contact__card-box">
                            <div class="contact__card-info">
                                <i class="bx bxl-instagram"></i>
                                <div>
                                    <h3 class="contact__card-title">Instagram</h3>
                                </div>
                            </div>
                            <a href="https://www.instagram.com/acala_bromo?igsh=MTB4dmFkcmFnNnht" target="_blank" >
                                <button class="button contact__card-button">Chat Now</button>
                            </a>
                        </div>
                        <!-- TWITTER -->
                        <div class="contact__card-box">
                            <div class="contact__card-info">
                                <i class="bx bxl-twitter"></i>
                                <div>
                                    <h3 class="contact__card-title">Twitter</h3>
                                </div>
                            </div>
                            <a href="https://x.com/acala_bromo" target="_blank" >
                                <button class="button contact__card-button">Chat Now</button>
                            </a>
                        </div>
                        <!-- TIKTOK -->
                        <div class="contact__card-box">
                            <div class="contact__card-info">
                                <i class="bx bxl-tiktok"></i>
                                <div>
                                    <h3 class="contact__card-title">Tiktok</h3>
                                </div>
                            </div>
                            <a href="https://www.tiktok.com/@acala_bromo?is_from_webapp=1&sender_device=pc" target="_blank" >
                                <button class="button contact__card-button">Chat Now</button>
                            </a>
                        </div>
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
                            <a href="#" class="footer__link">How We Work?
                            </a>
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
                            <a href="#" class="footer__link">Support center
                            </a>
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
            <span class="footer__copy">
                &#169; Acala Bromo. All rigths reserved
            </span>
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