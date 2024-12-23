<?php
session_start();
include "koneksi.php";

if(isset($_SESSION['email'])) {
    return header('location:indexA.php');
}

if (isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
    $hasil = mysqli_query($koneksi, $sql);
    $row = mysqli_fetch_array($hasil);
    
    if ($row !== null AND $row['email'] == $email AND $row['password'] == $password){
        $_SESSION['email'] = $email;
        echo "<script> alert('Login Berhasil') </script>";
        echo "<script> window.location.href='indexA.php' </script>";
    } else {
        $error = true;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="assets/css/login.css">
    <title>Login</title>
</head>

<body>
    <div class="wrapper">
        <?php if(isset($error)) {?>
            <div class="alert alert-danger" role="alert">
                Email or password is incorrect
            </div>
        <?php }?>
        <div class="container main">
            <div class="row">
                <div class="col-md-6 side-image">
                    <div class="text">
                        <p><b>Welcome <i>- Admin</i></b></p>
                    </div>
                </div>
                <div class="col-md-6 right">
                    <div class="input-box">
                        <header>Log In</header>
                        <form action="" method="POST">
                            <div class="input-field">
                                <input type="email" class="input" name="email" required>
                                <label for="email">Email</label>
                            </div>
                            <div class="input-field">
                                <input type="password" class="input" name="password" required>
                                <label for="pass">Password</label>
                            </div>
                            <div class="input-field">
                                <input type="submit" class="submit" name="login" value="Sign Up">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>