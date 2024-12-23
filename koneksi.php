<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "acala";

$koneksi = mysqli_connect($hostname, $username, $password, $database);

if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}
?>