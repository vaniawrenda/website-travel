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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/style2.css" />
    <style>
        /* Style untuk container form */
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }
        .centered-content {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Style untuk label */
        .label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        /* Style untuk input, textarea, dan select */
        .input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        /* Style untuk button */
        .save-button, .add-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            display: block;
            width: 100%;
            text-align: center;
        }

        .save-button:hover, .add-button:hover {
            background-color: #0056b3;
        }

        /* Style untuk form group */
        .form-group {
            margin-bottom: 15px;
        }

        /* Style untuk button add-button */
        .add-button {
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
    </style>
</head>
<body>
    <!-- =============== Navigation ================ -->
    <?php include 'assets/layout/adminSidebar.php'; ?>
    <!-- ========================= Main ==================== -->
    <div class="main d-flex justify-content-center align-items-center">
        <?php include 'assets/layout/adminNav.php' ?>
        <div class="centered-content w-100">
            <div class="form-container">
                <h1 style="margin-bottom: 20px; text-align: center;">Form Event</h1>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <?php
                        include 'koneksi.php';
                        $query = "SELECT MAX(CAST(SUBSTRING(id_event, 5) AS SIGNED)) AS max_id FROM event";
                        $result = mysqli_query($koneksi, $query);
                        $row = mysqli_fetch_assoc($result);
                        $max_id = $row['max_id'];
                        $new_id = "EVT0" . ($max_id + 1);
                        ?>
                        <label for="id" class="label">ID Event:</label>
                        <input type="text" id="id" name="id_event" class="input" value="<?= $new_id ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama" class="label">Nama Event:</label>
                        <input type="text" id="nama" name="nama" class="input" required>
                    </div>
                    <div class="form-group">
                        <label for="date" class="label">Tanggal:</label>
                        <input type="date" id="date" name="date" class="input" required>
                    </div>
                    <div class="form-group">
                        <label for="image" class="label">Upload Image:</label>
                        <input type="file" id="image" name="gambar" class="input" required>
                    </div>
                    <div class="form-group">
                        <label for="pesan" class="label">Description:</label>
                        <textarea id="pesan" name="deskripsi" class="input" required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="save" value="Save" class="save-button">
                    </div>
                </form>
                <button class="add-button" onclick="location.href='AreadEvent.php'">➜</button>
            </div>
        </div>
    </div>
    <!-- =========== Scripts =========  -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <script src="assets/js/main2.js"></script>
    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>

<?php
//SAVE 

if (isset($_POST['save'])){
    $id_event = $_POST['id_event'];
    $nama = $_POST['nama'];
    $tanggal = $_POST['date'];
    $deskripsi = $_POST['deskripsi'];

    // Handle image upload
    $image = $_FILES['gambar']['name'];
    $target_dir = "assets/img/event/";
    $target_file = $target_dir . basename($image);

    // Move the uploaded file to the target directory
    if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target_file)) {
        $sql2 = "INSERT INTO event VALUES ('$id_event', '$nama', '$tanggal', '$target_file', '$deskripsi')";
        $query2 = mysqli_query($koneksi, $sql2);
        if ($query2){
            echo "<script> alert('Event Baru Berhasil Ditambahkan') </script>";
            echo "<script> window.location.href='AreadEvent.php'</script>";
        } else {
            echo "<script> alert('Error: Could not save event') </script>";
        }
    } else {
        echo "<script> alert('Error: Could not upload image') </script>";
    }
}
?>