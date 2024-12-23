<?php
session_start();
include "koneksi.php";

// Periksa apakah user sudah login
if (!isset($_SESSION['email'])) {
    echo "<script> window.location.href='login.php' </script>";
}

//UPDATE
if(isset($_POST['update'])){
    // Define $id_event
    $id_event = $_POST['id_event'];
    
    $nama_event = $_POST['nama']; 
    $tanggal_event = $_POST['tanggal']; 
    $deskripsi_event = $_POST['deskripsi']; 
    
    $sqlU = "UPDATE event SET
            nama_event = '$nama_event',
            tanggal_event = '$tanggal_event',
            deskripsi_event = '$deskripsi_event'
            WHERE id_event = '$id_event'";
    $queryU = mysqli_query($koneksi, $sqlU);
    if($queryU){
        echo "<script> alert ('Data event Berhasil Diupdate') </script>";
        echo "<script> window.location.href = 'AreadEvent.php' </script>";
    } else {
        echo "<script> alert ('Update gagal. Error: " . mysqli_error($koneksi) . "') </script>"; // Display error message
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
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        .main {
            padding: 20px;
        }

        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
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

        .save-button {
            background-color: #007bff;
            color: #fff;
            padding: 15px 30px;
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
        textarea.input {
            height: 150px;
        }
    </style>
    </head>

<body>
    <!-- =============== Navigation ================ -->
    <?php include 'assets/layout/adminSidebar.php'; ?>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <?php include 'assets/layout/adminNav.php'; ?>
            <h1 style="margin-top: 20px; margin-left: 20px;">Edit Event</h1>

            <!-- ======================= Form ================== -->
            <button class="add-button" onclick="location.href='AreadEvent.php'">➜</button>
            <div class="form-container">
                <form action="" method="POST">
                    <div class="form-group">
                        <?php
                            include 'koneksi.php';
                            $id_event = $_GET['id_event'];
                            $sql = "SELECT * FROM event WHERE id_event = '$id_event'";
                            $query = mysqli_query($koneksi, $sql);
                            $row = mysqli_fetch_assoc($query);
                        ?>
                            <label for="id" class="label">ID Event :</label>
                            <input type="text" id="id" name="id_event" class="input" value="<?= $row['id_event'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama" class="label">Nama Event :</label>
                            <input type="text" id="nama" name="nama" class="input" value="<?= $row['nama_event'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="harga" class="label">Date :</label>
                            <input type="date" id="harga" name="tanggal" class="input" value="<?= $row['tanggal_event'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi" class="label">Description:</label>
                            <textarea id="deskripsi" name="deskripsi" class="input"><?= $row['deskripsi_event'] ?></textarea>
                        </div><br><br><br><br>
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
