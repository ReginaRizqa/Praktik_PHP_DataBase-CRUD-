<?php
include 'koneksi.php';

$keyword = '';
if (isset($_GET['keyword'])) {
    $keyword = mysqli_real_escape_string($link, $_GET['keyword']);
}

$query = "SELECT * FROM t_matakuliah WHERE namaMK LIKE '%$keyword%' ORDER BY kodeMK ASC";
$result = mysqli_query($link, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Matakuliah</title>
    <style>
        body { font-family: Arial; background:#f0f4f8; padding: 20px; }
        h1 { text-align:center; color:#333; }
        .search-container { width: 500px; margin: 20px auto; text-align:center; }
        input[type=text] {
            width: 70%; padding: 8px; font-size:16px; border: 2px solid #007bff; border-radius: 5px;
        }
        input[type=submit] {
            padding: 9px 15px; font-size: 16px; background: #007bff; color: white; border:none; border-radius:5px;
            cursor:pointer; margin-left:5px;
        }
        input[type=submit]:hover { background:#0056b3; }
        table {
            width: 700px; margin: auto; border-collapse: collapse; background: white;
            border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background: #007bff; color: white; }
        a { color: #007bff; text-decoration: none; margin-right: 10px; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <h1>Data Matakuliah</h1>
    <center><a href="inputmk.php" style="margin-bottom: 15px; display:inline-block;">Input Matakuliah</a></center>
    
    <div class="search-container">
        <form action="" method="GET">
            <input type="text" name="keyword" placeholder="Cari nama matakuliah..." value="<?php echo htmlspecialchars($keyword); ?>" />
            <input type="submit" value="Cari" />
            <?php if($keyword): ?>
                <a href="viewmk.php" style="margin-left:10px; font-size:14px; color:#555;">Reset</a>
            <?php endif; ?>
        </form>
    </div>

    <table border="1">
        <tr>
            <th>Kode MK</th>
            <th>Nama Matakuliah</th>
            <th>SKS</th>
            <th>Jam</th>
            <th>Pilihan</th>
        </tr>
        <?php
        if (!$result) {
            die("Query Error: ".mysqli_errno($link)." - ".mysqli_error($link));
        }

        if (mysqli_num_rows($result) == 0) {
            echo "<tr><td colspan='5' style='text-align:center;'>Data matakuliah tidak ditemukan.</td></tr>";
        } else {
            while ($data = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".htmlspecialchars($data['kodeMK'])."</td>";
                echo "<td>".htmlspecialchars($data['namaMK'])."</td>";
                echo "<td>".htmlspecialchars($data['sks'])."</td>";
                echo "<td>".htmlspecialchars($data['jam'])."</td>";
                echo "<td>
                        <a href='editmk.php?kodeMK=".$data['kodeMK']."'>Edit</a>
                        <a href='hapusmk.php?kodeMK=".$data['kodeMK']."' onclick=\"return confirm('Yakin hapus data?');\">Hapus</a>
                      </td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
</body>
</html>
