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
        }

        .user-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 1.1em;
        }

        .user-table th, .user-table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        .user-table th {
            background-color: #007bff;
            color: white;
        }

        .user-table tr:nth-child(even) {
            background-color: #f2f2f2;
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
        .user-table td:nth-child(3) {
            max-width: 300px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        

    </style>
</head>

<body>
    <!-- =============== Navigation ================ -->
    <?php include 'assets/layout/adminSidebar.php'; ?>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <?php include 'assets/layout/adminNav.php'; ?>
            <h1 style="margin-top: 20px; margin-left: 20px;">Event</h1>
            <!-- ======================= Cards ================== -->
            <button class="add-button" onclick="location.href='AcreateEvent.php'">+</button>

            <div class="cardBox">
                <div class="card">
                    <div>
                        <table class="user-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Event</th>
                                    <th>Deskripsi Event</th>
                                    <th>Tanggal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                include 'koneksi.php';
                                $sql = "SELECT * FROM event";
                                $query = mysqli_query($koneksi, $sql);
                                $no = 1;
                                while ($row = mysqli_fetch_array($query)){?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $row['nama_event'] ?></td>
                                        <td><?= $row['deskripsi_event'] ?></td>
                                        <td><?= $row['tanggal_event'] ?></td>
                                        <td> <a href="AupdateEvent.php?id_event=<?= $row['id_event'] ?> " class="action-icon">
                                            <span style="margin-right: 10px;">
                                                <ion-icon name="pencil-outline"></ion-icon>
                                            </span>
                                            </a>
                                            <a href="?id_event=<?= $row['id_event'] ?>" onclick="return confirm('Anda yakin akan menghapus Event ini?')" class="action-icon">
                                                <span style="margin-left: 10px;">
                                                    <ion-icon name="trash-outline"></ion-icon>
                                                </span>
                                            </a>
                                        </td>
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

<?php
// DELETE
if (isset($_GET['id_event'])){
    $id_event = $_GET['id_event'];

    $sql1 = "DELETE FROM event WHERE id_event = '$id_event'";
    $hasil1 = mysqli_query($koneksi, $sql1);
    if ($hasil1){
        echo "<script> alert('Data Event berhasil dihapus')</script>";
        echo "<script> window.location.href='AreadEvent.php' </script>";
    }
}
?>