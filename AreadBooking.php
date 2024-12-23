<?php
session_start();
include "koneksi.php";

// Periksa apakah user sudah login
if (!isset($_SESSION['email'])) {
    echo "<script> window.location.href='login.php' </script>";
}
?>

<?php
include 'koneksi.php';
$tanggal_sekarang = date("Y-m-d");
$sql = "SELECT * FROM booking 
INNER JOIN paket ON booking.id_paket = paket.id_paket 
WHERE status_bayar = 'sudah bayar' AND tanggal_paket>= '$tanggal_sekarang'";
$query = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Acala Bromo</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/style2.css" />
    <style>
        .cardBox {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 20px;
            padding: 20px;
            width: 100%;
            max-width: 1200px; 
            overflow-x: auto;
        }

        .user-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .user-table th, .user-table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        .user-table th {
            background-color: #007bff;
            color: white;
            text-align: center;
        }

        .user-table tr:hover {
            background-color: #f2f2f2;
        }

        /* Adjust table responsiveness for smaller screens */
        @media only screen and (max-width: 600px) {
            .card {
                padding: 10px; 
            }

            .user-table th,
            .user-table td {
                font-size: 14px; 
            }
        }
    </style>
</head>
<body>
    <!-- =============== Navigation ================ -->
    <?php include 'assets/layout/adminSidebar.php'; ?>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <?php include 'assets/layout/adminNav.php'; ?>
            <h1 style="margin-top: 20px; margin-left: 20px;">Data Booking</h1>

            <!-- ======================= Cards ================== -->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <table class="user-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Point Penjemputan</th>
                                    <th>Date</th>
                                    <th>Paket</th>
                                    <th>Qty</th>
                                    <th>Bayar</th>
                                    <th>Status Bayar</th>
                                    <th>Catatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($row = mysqli_fetch_array($query)) { 
                                    ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $row['nama'] ?></td>
                                        <td><?= $row['email'] ?></td>
                                        <td><?= $row['hp'] ?></td>
                                        <td><?= $row['point_penjemputan'] ?></td>
                                        <td><?= $row['tanggal_paket'] ?></td>
                                        <td><?= $row['nama_paket'] ?></td>
                                        <td><?= $row['jumlah_pesanan'] ?></td>
                                        <td><?= $row['total_harga'] ?></td>
                                        <td><?= $row['status_bayar'] ?></td>
                                        <td><?= $row['catatan'] ?></td>
                                    </tr>
                                <?php
                                $no++;
                                }
                                ?>
                            </tbody>
                        </table>                
                    </div>
                </div>
            </div>            

           
    <!-- =========== Scripts =========  -->
    <script src="assets/js/main2.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>