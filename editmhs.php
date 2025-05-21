<?php
include 'koneksi.php';

if (isset($_GET['npm'])) {
    $npm = $_GET['npm'];
    $query = "SELECT * FROM t_mahasiswa WHERE npm='$npm'";
    $result = mysqli_query($link, $query);

    if (!$result) {
        die("Query Error: " . mysqli_errno($link) . " - " . mysqli_error($link));
    }

    $data = mysqli_fetch_assoc($result);
    $namaMhs = $data['namaMhs'];
    $prodi = $data['prodi'];
    $alamat = $data['alamat'];
    $noHP = $data['noHP'];
} else {
    header("Location: viewmhs.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef2f7;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        .container {
            width: 500px;
            margin: auto;
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        table {
            width: 100%;
        }

        td {
            padding: 8px;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
        }

        input[type="submit"] {
            padding: 10px 18px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <h1>Edit Data Mahasiswa</h1>
    <div class="container">
        <form action="proses_editmhs.php" method="POST">
            <input type="hidden" name="npm" value="<?php echo $npm; ?>">
            <table>
                <tr>
                    <td>Nama Mahasiswa</td>
                    <td><input type="text" name="namaMhs" value="<?php echo $namaMhs; ?>" required></td>
                </tr>
                <tr>
                    <td>Program Studi</td>
                    <td><input type="text" name="prodi" value="<?php echo $prodi; ?>" required></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><input type="text" name="alamat" value="<?php echo $alamat; ?>" required></td>
                </tr>
                <tr>
                    <td>No HP</td>
                    <td><input type="text" name="noHP" value="<?php echo $noHP; ?>" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="edit" value="Edit"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
