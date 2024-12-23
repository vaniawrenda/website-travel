<?php
session_start();
include "koneksi.php";

// Periksa apakah user sudah login
if (!isset($_SESSION['email'])) {
    echo "<script> window.location.href='login.php' </script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Acala Bromo</title>
    <!-- Tambahkan chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Tambahkan stylesheet -->
    <link rel="stylesheet" href="assets/css/style2.css" />   
</head>
<body>
    <?php include 'assets/layout/adminSidebar.php'; ?>

    <!-- Main -->
    <div class="main">
        <?php include 'assets/layout/adminNav.php'; ?>
        <h1 style="margin-top: 20px; margin-left: 20px;">Dashboard</h1>
        <!-- Cards -->
        <div class="cardBox">
            <div class="card">
                <div>
                    <p>Welcome Admin!</p>            
                </div>
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
