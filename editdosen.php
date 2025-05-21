<?php

include 'koneksi.php';

if (isset($_GET['idDosen'])) {
    $id = $_GET['idDosen'];
    $query = "SELECT * FROM t_dosen WHERE idDosen='$id'";
    $result = mysqli_query($link, $query);

    if (!$result) {
        die("Query Error: " . mysqli_errno($link) .
            " - " . mysqli_error($link));
    }

    $data = mysqli_fetch_assoc($result);
    $idDosen = $data['idDosen'];
    $namaDosen = $data['namaDosen'];   
    $noHp = $data['noHP'];
} else {
    header("Location: viewdosen.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Dosen</title>
    <style>
        h1{
            text-align: center;
        }

        .container{
            width: 00px;
            margin: auto;
        }
        </style>
</head>
<body>
    <h1>Edit Data Dosen</h1>
    <div class="container">
        <form action="proses_editdosen.php" method="POST">
            <input type="hidden" name="idDosen" value="<?php echo $idDosen; ?>">
            <table>
                <tr>
                    <td>Nama Dosen</td>
                    <td><input type="text" name="namaDosen" value="<?php echo $namaDosen; ?>"></td>
                </tr>
                <tr>
                    <td>No HP</td>
                    <td><input type="text" name="noHP" value="<?php echo $noHP; ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="edit" value="Edit"></td>
                </tr>
            </table>
        </form>
</body>
</html>