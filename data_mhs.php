<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h2>Data Mahasiswa</h2>
    </header>
    <div class="container">
        <table>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Program Studi</th>
                <th>Email</th>
            </tr>
            <?php 
            for ($row = 1; $row <= 10; $row++) {
                echo '<tr>';
                for ($col = 1; $col <= 5; $col++) {
                    echo '<td>' . (($col > 1) ? "Data $row, $col" : $row) . '</td>';
                }
                echo '</tr>';
            }
            ?>
        </table>
    </div>
</body>
</html>