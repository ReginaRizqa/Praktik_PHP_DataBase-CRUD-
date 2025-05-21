<?php
include 'koneksi.php';

if (isset($_POST['input'])) {
    $namaDosen = $_POST['namaDosen'];
    $noHp = $_POST['noHP'];

    $query = "INSERT INTO t_dosen (namaDosen, noHP) VALUES ('$namaDosen', '$noHP')";
    $result = mysqli_query($link, $query);

    if (!$result) {
        die("Query gagal dijalankan: " . mysqli_errno($link) . " - " . mysqli_error($link));
    }

    header("Location: viewdosen.php");
}
?>