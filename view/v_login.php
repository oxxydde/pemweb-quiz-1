<!DOCTYPE html>
<html lang="en">
<head>
    <title>Halaman Login</title>
    <link rel="stylesheet" href="./assets/login.css">
</head>
<body>
    <h2>Login ke Sistem Data Mahasiswa</h2>
    <form action="./login.php" method="post">
        <div class="username">
            <span>Username</span>
            <br>
            <input type="text" class="textfield" name="username" id="username" required>
        </div>
        <div class="password">
            <span>Password</span>
            <br>
            <input type="password" class="textfield" name="password" id="password" required>
        </div>
        <input class="login-btn" type="submit" value="Masuk">
    </form>
    <?php 
    if ($wrongInput) {
        setcookie("wrongpass", null, time() - 7200);
        echo '<script type="text/javascript">alert("Username atau password anda salah!");</script>';
    }
    ?>
</body>
</html>