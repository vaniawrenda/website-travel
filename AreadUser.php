<?php
session_start();
include "koneksi.php";

// Periksa apakah user sudah login
if (!isset($_SESSION['email'])) {
    echo "<script> window.location.href='login.php' </script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Acala Bromo</title>
    <link rel="stylesheet" href="assets/css/style2.css" />
</head>

<body>
    <?php include 'assets/layout/adminSidebar.php'; ?>

    <div class="main">
        <?php include 'assets/layout/adminNav.php'; ?>
        <h1 style="margin-top: 20px; margin-left: 20px;">Log Admin</h1>

        <div class="cardBox">
            <div class="card">
                <div>
                    <table class="user-table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM admin";
                            $query1 = mysqli_query($koneksi, $sql);
                            if (!$query1) {
                                die("Query gagal: " . mysqli_error($koneksi));
                            }

                            // Ambil dan tampilkan data
                            while ($row = mysqli_fetch_array($query1)) { ?>
                                <tr>
                                    <td><?= htmlspecialchars($row['nama_admin']) ?></td>
                                    <td><?= htmlspecialchars($row['email']) ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>                
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/main2.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>

<?php
$koneksi->close();
?>
