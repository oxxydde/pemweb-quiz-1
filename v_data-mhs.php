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
        <h4>Halo, 
        <?php 
            if ($isAdmin) {
                echo 'Admin</h4>';
                echo '<a href=".?logout=1">Log Out</a>';
                echo '<br></br>';

            } else {
                echo 'Guest</h4>';
                echo '<a href="login.php">Log In</a>';
                echo '<br></br>';
            }
        ?>
        <table>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Program Studi</th>
                <th>Email</th>
                <?php 
                    if ($isAdmin) {
                        echo '<th>Aksi</th>';
                    }
                ?>
            </tr>
            <?php 
            for ($row = 1; $row <= 10; $row++) {
                echo '<tr>';
                for ($col = 1; $col <= 5; $col++) {
                    echo '<td>' . (($col > 1) ? "Data $row, $col" : $row) . '</td>';
                }
                // isAdmin
                if ($isAdmin) {
                    echo '<td>Admin</td>';
                }
                echo '</tr>';
            }
            ?>
        </table>
    </div>
</body>
</html>