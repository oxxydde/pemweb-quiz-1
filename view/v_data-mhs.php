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
            if (isset($_COOKIE["user"])) {
                echo $_COOKIE["user"] . "</h4>";
                echo '<a href="login.php?logout=1">Log Out</a>';
                echo '<br></br>';
            } else {
                echo 'Guest</h4>';
                echo '<a href="login.php">Log In</a>';
                echo '<br></br>';
            }
            if (isset($_COOKIE["user"])) {
            ?>
            <div class="inner" id="add" style="flex-direction: column; width: 33%;">
                <h3>Tambah Data Mahasiswa</h3>
                <span>NIM</span>
                <input type="text" class="textfield" name="nim" id="nim">
                <span>Nama</span>
                <input type="text" class="textfield" name="nama" id="nama">
                <span>Program Studi</span>
                <input type="text" class="textfield" name="prodi" id="prodi">
                <span>Email</span>
                <input type="text" class="textfield" name="email" id="email">
                <div class="confirm-btns">
                    <input type="button" class="action-btn" id="add-confirm" value="Tambah">
                </div>
            </div>
            <?php } ?>
            <div class="inner" id="data">
                <table>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Program Studi</th>
                        <th>Email</th>
                        <?php
                        if (isset($_COOKIE["user"])) {
                            echo '<th>Aksi</th>';
                        }
                        ?>
                    </tr>
                    <?php
                    $counter = 0;
                    foreach ($mahasiswas as $row) {
                        echo '<tr class="row">';
                        echo '<td>' . ++$counter . '</td>';
                        echo '<td>' . $row->getNim() . '</td>';
                        echo '<td>' . $row->getNama() . '</td>';
                        echo '<td>' . $row->getProdi() . '</td>';
                        echo '<td>' . $row->getEmail() . '</td>';
                        if (isset($_COOKIE["user"])) { ?>
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
                if (isset($_COOKIE["user"])) {
                ?>
                    <div class="edit-container" style="display: none">
                        <h3>Ubah Data Mahasiswa</h3>
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
    <link rel="stylesheet" href="./assets/style.css">
    <script src="./assets/script.js"></script>
</body>

</html>