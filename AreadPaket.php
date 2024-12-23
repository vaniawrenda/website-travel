<?php
session_start();
include "koneksi.php";

// Periksa apakah user sudah login
if (!isset($_SESSION['email'])) {
    echo "<script> window.location.href='login.php' </script>";
}

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
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
        }

        .main {
            padding: 20px;
        }

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
            overflow-x: auto
        }

        .user-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            border-radius: 10px; 
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
            background-color: #ddd;
        }

        
        .action-icon {
            display: inline-block;
            margin: 0 5px;
            padding: 8px;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            text-align: center;
            transition: background-color 0.3s, transform 0.3s;
        }

        .action-icon:hover {
            background-color: #0056b3;
            transform: scale(1.1);
        }

        .action-icon ion-icon {
            font-size: 1.5em;
        }
        .add-button {
            position: absolute;
            top: 80px;
            right: 20px;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            z-index: 999;
            transition: background-color 0.3s, color 0.3s;
        }

        .add-button:hover {
            background-color: #0056b3;
        }

        h1 {
            font-size: 2em;
            margin-top: 20px;
        }
        .user-table th:last-child, .user-table td:last-child {
            width: 150px; 
        }
        @media only screen and (max-width: 600px) {
            .card {
                padding: 10px; /* Adjust padding for smaller screens */
            }

            .user-table th,
            .user-table td {
                font-size: 14px; /* Decrease font size for smaller screens */
            }

            .add-button {
                top: 60px; /* Adjust position of the add button for smaller screens */
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
            <h1 style="margin-top: 20px; margin-left: 20px;">Travel Package</h1>
            <!-- ======================= Cards ================== -->
            <button class="add-button" onclick="location.href='AcreatePaket.php'">+</button>
            
            <div class="cardBox">
                <div class="card">
                    <div>
                        <table class="user-table">
                            <thead>
                                <tr>
                                    <th>Nama Paket</th>
                                    <th>Harga paket</th>
                                    <th>Deskripsi Singkat</th>
                                    <th>Deskripsi paket</th>
                                    <th>Date</th>
                                    <th>Jenis</th>
                                    <th>Stok</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                include 'koneksi.php';
                                $sql = "SELECT * FROM paket ";
                                $query = mysqli_query($koneksi, $sql);
                                
                                while ($row = mysqli_fetch_array($query)){?>
                                    <tr>
                                        <td><?= $row['nama_paket'] ?></td>
                                        <td><?= $row['harga_paket'] ?></td>
                                        <td><?= $row['deskripsi_singkat'] ?></td>
                                        <td><?= $row['deskripsi_paket'] ?></td>
                                        <td><?= $row['tanggal_paket'] ?></td>
                                        <td><?= $row['jenis_paket'] ?></td>
                                        <td><?= $row['stok'] ?></td>
                                        <td> 
                                            <a href="AupdatePaket.php?id_paket=<?= $row['id_paket'] ?>" class="action-icon">
                                                <span style="margin-right: 10px;">
                                                    <ion-icon name="pencil-outline"></ion-icon>
                                                </span>
                                            </a>
                                            <a href="?id_paket= <?= $row['id_paket'] ?>" onclick="return confirm('Anda yakin akan menghapus Data Paket ini?')" class="action-icon">
                                                <span style="margin-left: 10px;">
                                                    <ion-icon name="trash-outline"></ion-icon>
                                                </span>
                                            </a>
                                        </td>
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
           
    <!-- =========== Scripts =========  -->
    <script src="assets/js/main2.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>

<?php
//DELETE
if (isset($_GET['id_paket'])){
    $id_paket = $_GET['id_paket'];

    $sql1 = "DELETE FROM paket WHERE id_paket = '$id_paket'";
    $hasil1 = mysqli_query($koneksi, $sql1);
    if ($hasil1){
        echo "<script> alert('Data Paket berhasil dihapus')</script>";
        echo "<script> window.location.href='AreadPaket.php' </script>";
    }
}
?>