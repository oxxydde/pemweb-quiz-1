<!DOCTYPE html>
<html lang="en">

<head>
    <title>Data Mahasiswa</title>
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
            <div class="inner">
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
                        echo '<tr class="row">';
                        for ($col = 1; $col <= 5; $col++) {
                            echo '<td>' . (($col > 1) ? "Data $row, $col" : $row) . '</td>';
                        }
                        if ($isAdmin) { ?>
                            <td>
                                <button class="action-btn update">Update</button>
                                <button class="action-btn delete">Hapus</button>
                            </td>
                    <?php }
                        echo '</tr>';
                    }
                    ?>
                </table>
                <?php 
                if ($isAdmin) {
                ?>
                <div class="edit-container" style="display: none">
                    <h3>Ubah Data Mahasiswa</h3>
                        <span>NIM</span>
                        <input type="text" class="textfield" name="nim" id="nim">
                        <span>Nama</span>
                        <input type="text" class="textfield" name="nama" id="nama">
                        <span>Program Studi</span>
                        <input type="text" class="textfield" name="prodi" id="prodi">
                        <span>Email</span>
                        <input type="text" class="textfield" name="email" id="email">
                        <div class="confirm-btns">
                            <input type="button" class="action-btn" id="update-confirm" value="Ubah">
                            <input type="button" class="action-btn" id="cancel-confirm" value="Batal">
                        </div>
                </div>
            </div>
            <?php } ?>
    </div>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</body>

</html>