<?php
include 'koneksi.php';

$keyword = '';
if (isset($_GET['keyword'])) {
    $keyword = mysqli_real_escape_string($link, $_GET['keyword']);
}

// Query dengan pencarian nama dosen
$query = "SELECT * FROM t_dosen WHERE namaDosen LIKE '%$keyword%' ORDER BY idDosen ASC";
$result = mysqli_query($link, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Dosen</title>
    <style>
        /* Styling sama seperti sebelumnya, plus styling form */
        body {
            font-family: Arial, sans-serif;
            background: #f0f4f8;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .search-container {
            width: 400px;
            margin: 20px auto;
            text-align: center;
        }
        input[type=text] {
            width: 70%;
            padding: 8px;
            font-size: 16px;
            border: 2px solid #007bff;
            border-radius: 5px;
        }
        input[type=submit] {
            padding: 9px 15px;
            font-size: 16px;
            background-color: #007bff;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 5px;
        }
        input[type=submit]:hover {
            background-color: #0056b3;
        }
        table {
            width: 840px;
            margin: auto;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        a {
            color: #007bff;
            text-decoration: none;
            margin-right: 10px;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Data Dosen</h1>
    
    <div class="search-container">
        <form action="" method="GET">
            <input type="text" name="keyword" placeholder="Cari nama dosen..." value="<?php echo htmlspecialchars($keyword); ?>" />
            <input type="submit" value="Cari" />
            <?php if($keyword): ?>
                <a href="viewdosen.php" style="margin-left:10px; font-size:14px; color:#555;">Reset</a>
            <?php endif; ?>
        </form>
    </div>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Dosen</th>
            <th>No HP</th>
            <th>Pilihan</th>
        </tr>
        <?php
        if (!$result) {
            die("Query Error: ".mysqli_errno($link)." - ".mysqli_error($link));
        }

        if (mysqli_num_rows($result) == 0) {
            echo "<tr><td colspan='4' style='text-align:center;'>Data dosen tidak ditemukan.</td></tr>";
        } else {
            while($data = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>".$data['idDosen']."</td>";
                echo "<td>".htmlspecialchars($data['namaDosen'])."</td>";
                echo "<td>".htmlspecialchars($data['noHP'])."</td>";
                echo "<td>
                        <a href='editdosen.php?idDosen=".$data['idDosen']."'>Edit</a>
                        <a href='hapusdosen.php?id=".$data['idDosen']."' onclick=\"return confirm('Yakin hapus data?');\">Hapus</a>
                      </td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
</body>
</html>
