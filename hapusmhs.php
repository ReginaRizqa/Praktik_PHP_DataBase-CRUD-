<?php
include 'koneksi.php';

if (isset($_GET['npm'])) {
    $npm = $_GET['npm'];

    // Query untuk menghapus data mahasiswa berdasarkan NPM
    $query = "DELETE FROM t_mahasiswa WHERE npm='$npm'";
    $result = mysqli_query($link, $query);

    if (!$result) {
        die("Query gagal dijalankan: " . mysqli_errno($link) . " - " . mysqli_error($link));
    }

    // Redirect ke halaman viewmahasiswa.php setelah berhasil menghapus
    header("Location: viewmhs.php");
}
?>
