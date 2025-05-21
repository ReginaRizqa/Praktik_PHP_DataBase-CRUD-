<?php
//variabel koneksi dengan database


$host = "127.0.0.1";
$user = "root";
$pass = ""; // ← Password baru kamu
$db   = "praktikum_php";//

$link = mysqli_connect($host, $user, $pass, $db);

if (!$link) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>