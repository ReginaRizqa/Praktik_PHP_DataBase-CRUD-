<?php
include 'koneksi.php';

if (isset($_GET['kodeMK'])) {
    $kodeMK = $_GET['kodeMK'];
    $query = "SELECT * FROM t_matakuliah WHERE kodeMK='$kodeMK'";
    $result = mysqli_query($link, $query);

    if (!$result) {
        die("Query Error: " . mysqli_errno($link) . " - " . mysqli_error($link));
    }

    $data = mysqli_fetch_assoc($result);
    $namaMK = $data['namaMK'];
    $sks = $data['sks'];
    $jam = $data['jam'];
} else {
    header("Location: viewmk.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Matakuliah</title>
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

        input[type="text"], input[type="number"] {
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
    <h1>Edit Data Matakuliah</h1>
    <div class="container">
        <form action="proses_editmk.php" method="POST">
            <input type="hidden" name="kodeMK" value="<?php echo htmlspecialchars($kodeMK); ?>">
            <table>
                <tr>
                    <td>Nama Matakuliah</td>
                    <td><input type="text" name="namaMK" value="<?php echo htmlspecialchars($namaMK); ?>" required></td>
                </tr>
                <tr>
                    <td>SKS</td>
                    <td><input type="number" name="sks" value="<?php echo htmlspecialchars($sks); ?>" min="1" max="10" required></td>
                </tr>
                <tr>
                    <td>Jam</td>
                    <td><input type="number" name="jam" value="<?php echo htmlspecialchars($jam); ?>" min="1" max="20" required></td>
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
