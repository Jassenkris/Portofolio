<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "Project 2_4 Web.lvl2"; // nama database

// Membuka koneksi ke MySQL
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Memeriksa status koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

?>