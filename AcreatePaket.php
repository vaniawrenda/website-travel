<?php
session_start();
include "koneksi.php";

// Periksa apakah user sudah login
if (!isset($_SESSION['email'])) {
    echo "<script> window.location.href='login.php' </script>";
}


// Save paket
if(isset($_POST['save'])){
    $query = "INSERT INTO paket VALUES
    ('$_POST[id_paket]', '$_POST[nama]', '$_POST[harga]', '$_POST[deskripsi_singkat]', '$_POST[deskripsi]', '$_POST[tanggal]', '$_POST[jenis]', '$_POST[stok]')";
    if(mysqli_query($koneksi, $query)){
        echo "<script> alert ('Data Paket Baru Berhasil Ditambahkan') </script>";
        echo "<script> window.location.href = 'AreadPaket.php' </script>";
    }
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
        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: 50px auto; 
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .label {
            display: block;
            font-size: 1.2em;
            margin-bottom: 5px;
            color: #333;
        }

        .input {
            width: 100%;
            padding: 10px;
            font-size: 1.1em;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border-color 0.3s;
        }

        .input:focus {
            outline: none;
            border-color: #007bff;
        }

        .add-button {
            background-color: #007bff; 
            position: absolute;
            top: 60px;
            right: 20px;
            width: 50px;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 24px;
            padding: 0;
            border-radius: 50%;
        }

        .save-button {
            background-color: #007bff;
            color: #fff;
            padding: 12px 20px;
            font-size: 1.2em;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }

        .save-button:hover {
            background-color: #0056b3;
        }

        h1 {
            font-size: 2em;
            margin-top: 20px;
            margin-left: 20px;
        }
    </style>
    </head>

<body>
    <!-- =============== Navigation ================ -->
    <?php include 'assets/layout/adminSidebar.php'; ?>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <?php include 'assets/layout/adminNav.php' ?>
            <!-- ======================= Form ================== -->
            <button class="add-button" onclick="location.href='AreadPaket.php'">➜</button>
            <div class="form-container">
                <form action="" method="POST">
                    <div class="form-group">
                        <?php
                            include 'koneksi.php';
                            $query = "SELECT MAX(CAST(SUBSTRING(id_paket, 5) AS SIGNED)) AS max_id
                            FROM paket";
                            $result = mysqli_query($koneksi, $query);
                            $row = mysqli_fetch_assoc($result);
                            $max_id = $row['max_id'];
                            // Membuat ID baru
                            $new_id = "PKT0" . ($max_id + 1);
                        ?>
                        <h1 style="margin-bottom: 20px; text-align: center;">Form Package</h1>
                            <label for="id" class="label">ID Package:</label>
                            <input type="text" id="id" name="id_paket" class="input" value="<?= $new_id ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama" class="label">Nama Package:</label>
                            <input type="text" id="nama" name="nama" class="input">
                        </div>
                        <div class="form-group">
                            <label for="harga" class="label">Price:</label>
                            <input type="number" id="harga" name="harga" class="input">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi" class="label">Sort Description:</label>
                            <textarea id="deskripsi" name="deskripsi_singkat" class="input"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi" class="label">Description:</label>
                            <textarea id="deskripsi" name="deskripsi" class="input"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="tanggal" class="label">Date:</label>
                            <input type="date" id="tanggal" name="tanggal" class="input">
                        </div>
                        <div class="form-group">
                            <label for="jenis" class="label">Type:</label>
                            <select class="input" name="jenis" id="jenis">
                                <option value="open">Open</option>
                                <option value="private">Private</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="stok" class="label">Stok:</label>
                            <input type="number" id="stok" name="stok" class="input">
                        </div><br><br>
                        <input type="submit" name="save" value="Save" class="save-button">
                </form>
            </div>
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="assets/js/main2.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module"
        src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule
        src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
