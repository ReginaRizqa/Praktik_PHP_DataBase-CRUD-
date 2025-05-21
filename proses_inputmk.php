<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $kodeMK = $_POST['kodeMK'];
    $namaMK = $_POST['namaMK'];
    $sks = $_POST['sks'];
    $jam = $_POST['jam'];

    $query = "INSERT INTO t_matakuliah (kodeMK, namaMK, sks, jam)
              VALUES ('$kodeMK', '$namaMK', '$sks', '$jam')";
    $result = mysqli_query($link, $query);

    if (!$result) {
        die("Query gagal dijalankan: " . mysqli_errno($link) . " - " . mysqli_error($link));
    }

    header("Location: viewmk.php");
}
?>
