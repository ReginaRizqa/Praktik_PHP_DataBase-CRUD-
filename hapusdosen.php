<?php
include 'koneksi.php';
if (isset($_GET['id'])) {
    $idDosen = $_GET['id'];

    // Query untuk menghapus data dosen berdasarkan id
    $query = "DELETE FROM t_dosen WHERE idDosen='$idDosen'";
    $result = mysqli_query($link, $query);

    if (!$result) {
        die("Query gagal dijalankan: " . mysqli_errno($link) . " - " . mysqli_error($link));
    }

    // Redirect ke halaman viewdosen.php setelah berhasil menghapus
    header("Location: viewdosen.php");


}
?>