<?php
include 'koneksi.php';

if (isset($_GET['kodeMK'])) {
    $kodeMK = $_GET['kodeMK'];

    // Query untuk menghapus data matakuliah berdasarkan kodeMK
    $query = "DELETE FROM t_matakuliah WHERE kodeMK='$kodeMK'";
    $result = mysqli_query($link, $query);

    if (!$result) {
        die("Query gagal dijalankan: " . mysqli_errno($link) . " - " . mysqli_error($link));
    }

    // Redirect ke halaman viewmatakuliah.php setelah berhasil menghapus
    header("Location: viewmk.php");
}
?>
