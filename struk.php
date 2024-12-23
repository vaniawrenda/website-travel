<?php

include 'koneksi.php';

$order_id = $_GET['order_id'];
$updatestatus = "UPDATE booking set status_bayar = 'sudah bayar' WHERE id_booking = '$order_id' " ;
$querystastus = mysqli_query($koneksi, $updatestatus);

$sql = "SELECT * FROM booking 
        INNER JOIN paket ON booking.id_paket = paket.id_paket 
        WHERE booking.id_booking = '$order_id'";

$query = mysqli_query($koneksi, $sql);
$row = mysqli_fetch_assoc($query);

$sql2 = "UPDATE paket SET stok = stok - $row[jumlah_pesanan] WHERE id_paket = '$row[id_paket]'";

$query2 = mysqli_query($koneksi, $sql2);
?>

<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--=============== BOXICONS ===============-->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <!--=============== SWIPER CSS ===============-->
    <link rel="stylesheet" href="./assets/libraries/swiper-bundle.min.css" />
    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="./assets/css/style.css" />
    <style>
    html, body {
        height: 100%;
        margin: 0;
    }

    body {
        background-image: url("assets/img/bromo4.jpg");
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }

    .event-item {
      display: flex;
      justify-content: center;
      flex-direction: column;
      background-color: white;
      width: 400px;
      height: auto;
      margin: auto;
      margin-top :100px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      transition: transform 0.3s ease;
      position: relative;
    }

    .event-item:hover {
      transform: translateY(-5px);  
    }

    .event-item__content {
      padding: 20px;
    }

    .event-item__title {
      text-align: center;
      margin-top: 0;
      margin-bottom: 10px;
    }

    .event-item__date {
      margin-bottom: 10px;
      font-size: 20px;
    }

    .event-item__description {
      margin-bottom: 0;
      text-align: justify;
    }

    .print-btn {
      display: block;
      margin: 20px auto 0;
      width: 100%;
      background-color: #007bff;
      border: none;
      border-radius: 5px;
      padding: 10px 0;
      text-align: center;
      cursor: pointer;
      transition: background-color 0.3s;
    }
    .print-btn:hover {
      background-color: #0056b3;
    }
    .print-btn a {
      text-decoration: none;
      color: #fff;
      font-weight: bold;
    }
    table {
            width: 100%;
        }
        th, td {
            text-align: left;
            padding: 5px;
            vertical-align: top;
        }
        th {
            width: 30%;
        }
        
@media print {
    body {
        size: A5;
    }
    .event-item {
        width: 100%;
        height: auto;
    }
    .print-btn {
        display: none; /* Hide print button in print mode */
    }
    .note{
        display: none;
    }
    .header{
        display: none;
    }

}


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
                        <a href="index.html" class="nav__link active-link">
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
<div class="content">
    <div class="struk-container">
        <article class="event-item">
            <div class="event-item__content">
                <div class="event-item__checkmark">&#10004; Transaksi Berhasil</div><br>
                <h2 class="event-item__title"><b>Acala Bromo</b></h2>
                <h3 class="event-item__title"><b><?= $row['id_booking'] ?></b></h3>
                <table>
                    <tr>
                        <td><b>Nama Pemesan</b></td>
                        <td>:</td>
                        <td><?= $row['nama'] ?></td>
                    </tr>
                    <tr>
                        <td><b>Nomor Telp/WhatsApp</b></td>
                        <td>:</td>
                        <td><?= $row['hp'] ?></td>
                    </tr>
                    <tr>
                        <td><b>Tanggal Booking</b></td>
                        <td>:</td>
                        <td><?= $row['tanggal_booking'] ?></td>
                    </tr>
                    <tr>
                        <td><b>Nama Paket</b></td>
                        <td>:</td>
                        <td><?= $row['nama_paket'] ?></td>
                    </tr>
                    <tr>
                        <td><b>Jumlah Pemesanan</b></td>
                        <td>:</td>
                        <td><?= $row['jumlah_pesanan'] ?></td>
                    </tr>
                    <tr>
                        <td><b>Total Bayar</b></td>
                        <td>:</td>
                        <td>Rp <?= number_format($row['total_harga'], 0, '.', '.') ?>,-</td>
                    </tr>
                </table>
            </div>
            <button class="print-btn" onclick="window.print()">Cetak Struk</button>
        </article>
    </div>
</div>
</body>
</html>
