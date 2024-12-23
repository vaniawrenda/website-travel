<?php
session_start();
include "koneksi.php";

// Periksa apakah user sudah login
if (!isset($_SESSION['email'])) {
    echo "<script> window.location.href='login.php' </script>";
    exit;
}

// Mengatur tahun default ke tahun sekarang jika tidak ada filter tahun
$year = isset($_POST['year']) ? $_POST['year'] : date('Y');

// SQL untuk Data pendapatan dalam tabel
$sql = "SELECT MONTH(tanggal_booking) AS bulan, SUM(jumlah_pesanan) AS pelanggan, SUM(total_harga) AS pendapatan
         FROM booking
        --  INNER JOIN booking ON paket.id_paket = booking.id_paket
         WHERE YEAR(tanggal_booking) = '$year' AND status_bayar = 'sudah bayar'
         GROUP BY MONTH(tanggal_booking)";
$query = mysqli_query($koneksi, $sql);

$data = array_fill(0, 12, 0); // Inisialisasi array untuk 12 bulan

while ($row = mysqli_fetch_assoc($query)) {
    $data[$row['bulan'] - 1] = $row['pendapatan']; // Menempatkan data pada bulan yang sesuai
}

$data_json = json_encode($data);

// SQL untuk Data pendapatan dalam tabel
$sql2 = "SELECT MONTH(tanggal_booking) AS bulan, SUM(jumlah_pesanan) AS pelanggan, SUM(total_harga) AS pendapatan
         FROM booking 
        --  INNER JOIN booking ON paket.id_paket = booking.id_paket
         WHERE YEAR(tanggal_booking) = '$year' AND status_bayar = 'sudah bayar'
         GROUP BY MONTH(tanggal_booking)";
$query2 = mysqli_query($koneksi, $sql2);

$total_pendapatan = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Acala Bromo</title>
    <!-- chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- stylesheet -->
    <link rel="stylesheet" href="assets/css/style2.css" />
    <link rel="stylesheet" href="assets/css/Apendapatan.css" />
</head>
<body>
    <?php include 'assets/layout/adminSidebar.php'; ?>
    <!-- Main -->
    <div class="main">
        <?php include 'assets/layout/adminNav.php'; ?>
        <h1 style="margin-top: 20px; margin-left: 20px;">Data Pendapatan</h1>

        <!-- CHART PENDAPATAN -->
        <div class="container-chart">
            <div class="form-filter">
                <form action="" method="POST">
                    <label for="year">Pilih Tahun:</label>
                    <select name="year" id="year">
                        <?php
                        $currentYear = date('Y');
                        for ($i = 2020; $i <= $currentYear; $i++) {
                            echo "<option value='$i'" . ($year == $i ? ' selected' : '') . ">$i</option>";
                        }
                        ?>
                    </select>
                    <button type="submit">Tampilkan</button>
                </form>
            </div>
            <div class="chart-container">
                <canvas id="incomeChart"></canvas>
            </div>
        </div>

        <!-- TABEL PENGHASILAN -->
        <div class="container-table">
            <table>
                <tr>
                    <th>Bulan</th>
                    <th>Pelanggan</th>
                    <th>Pendapatan</th>
                </tr>

                <?php
                while ($row2 = mysqli_fetch_assoc($query2)) {
                    $total_pendapatan += $row2['pendapatan'];
                    ?>

                    <tr>
                        <td><?= $row2['bulan'] ?></td>
                        <td><?= $row2['pelanggan'] ?></td>
                        <td>Rp <?= number_format($row2['pendapatan'], 2, ',', '.') ?></td>
                    </tr>
                <?php
                }
                ?>
                <tr class="total">
                    <td colspan="3">Total Pendapatan: Rp <?= number_format($total_pendapatan, 2, ',', '.') ?></td>
                </tr>
            </table>
        </div>
        <!-- Scripts -->
        <script>
            const ctx = document.getElementById('incomeChart');
            const data = <?php echo $data_json; ?>;
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                    datasets: [{
                        label: 'Total Pendapatan',
                        data: data,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 100000
                            }
                        }
                    }
                }
            });
        </script>
    </div>
    <!-- =========== Scripts =========  -->
    <script src="assets/js/main2.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
