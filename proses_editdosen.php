<?php 

if (isset($_POST['edit'])) {
    include 'koneksi.php';

    $idDosen = $_POST['idDosen'];
    $namaDosen = $_POST['namaDosen'];
    $noHp = $_POST['noHP'];

    $query = "UPDATE t_dosen SET namaDosen='$namaDosen', noHP='$noHP' WHERE idDosen='$idDosen'";
    $result = mysqli_query($link, $query);

    if (!$result) {
        die("Query gagal dijalankan: " . mysqli_errno($link) .
            " - " . mysqli_error($link));
    }

    header("Location: viewdosen.php");
}
?>