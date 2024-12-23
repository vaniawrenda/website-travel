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

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 600px;
            margin: 50px auto;
            text-align: left;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .label {
            display: block;
            margin-bottom: 5px;
            font-size: 1.2em;
            color: #333;
        }

        .input {
            width: 100%;
            padding: 10px;
            font-size: 1.1em;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        .input:focus {
            outline: none;
            border-color: #007bff;
        }

        .select {
            width: 100%;
            padding: 10px;
            font-size: 1.1em;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            background-color: #fff;
            appearance: none;
            /* Remove default arrow */
        }

        .textarea {
            width: 100%;
            height: 150px;
            padding: 10px;
            font-size: 1.1em;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            resize: none; /* Disable textarea resize */
        }

        .button-container {
            text-align: center;
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
        .add-button {
            background-color: #007bff; 
            position: absolute;
            top: 80px;
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

    </style>
    </head>

<body>
    <!-- =============== Navigation ================ -->
    <?php include 'assets/layout/adminSidebar.php'; ?>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <?php include 'assets/layout/adminNav.php'; ?>
            <h1 style="margin-top: 20px; margin-left: 20px;">Update Package</h1>

            <!-- ======================= Form ================== -->
            <button class="add-button" onclick="location.href='AreadPaket.php'">➜</button>
            <div class="form-container">
                <form action="" method="POST">
                    <div class="form-group">
                        <?php
                            include 'koneksi.php';
                            $id_paket = $_GET['id_paket'];
                            $sql = "SELECT * FROM paket WHERE id_paket = '$id_paket'";
                            $query = mysqli_query($koneksi, $sql);
                            $row = mysqli_fetch_assoc($query);
                        ?>
                            <label for="id" class="label">ID Package:</label>
                            <input type="text" id="id" name="id_paket" class="input" value="<?= $row['id_paket'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama" class="label">Name Package:</label>
                            <input type="text" id="nama" name="nama" class="input" value="<?= $row['nama_paket'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="harga" class="label">Price:</label>
                            <input type="number" id="harga" name="harga" class="input" value="<?= $row['harga_paket'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi" class="label">Sort Description:</label>
                            <textarea id="deskripsi" name="deskripsi_singkat" class="input"><?= $row['deskripsi_singkat'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi" class="label">Description:</label>
                            <textarea id="deskripsi" name="deskripsi" class="input"><?= $row['deskripsi_paket'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="tanggal" class="label">Date:</label>
                            <input type="date" id="tanggal" name="tanggal" class="input" value="<?= $row['tanggal_paket'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="jenis" class="label">Type:</label>
                            <select class="input" name="jenis" id="jenis">
                                <option value="open" <?= ($row['jenis_paket'] == 'open') ? 'selected' : ''; ?>>Open</option>
                                <option value="private" <?= ($row['jenis_paket'] == 'private') ? 'selected' : ''; ?>>Private</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="stok" class="label">Stock:</label>
                            <input type="number" id="stok" name="stok" class="input" value="<?= $row['stok'] ?>">
                        </div><br><br>
                        <input type="submit" name="update" value="Update" class="save-button">
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

<?php
//UPDATE
include 'koneksi.php';
if(isset($_POST['update'])){
    // Escape user inputs to prevent SQL injection
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $deskripsi_singkat = $_POST['deskripsi_singkat'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal = $_POST['tanggal'];
    $jenis = $_POST['jenis'];
    $stok = $_POST['stok'];

    // Update query
    $sqlU = "UPDATE paket SET
            nama_paket = '$nama',
            harga_paket = '$harga',
            deskripsi_singkat = '$deskripsi_singkat',
            deskripsi_paket = '$deskripsi',
            tanggal_paket = '$tanggal',
            jenis_paket = '$jenis',
            stok = '$stok'
            WHERE id_paket = '$id_paket'";
    $queryU = mysqli_query($koneksi, $sqlU);
    if($queryU){
        echo "<script> alert ('Data Paket Berhasil Diupdate') </script>";
        echo "<script> window.location.href = 'AreadPaket.php' </script>";
    } else {
        echo "Error updating record: " . mysqli_error($koneksi);
    }
}

?>