<!DOCTYPE html>
<html lang="en">
<head>
    <title>Halaman Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Login ke Sistem Data Mahasiswa</h2>
    <?php 
    if ($wrongCredential) {
        echo '<script type="text/javascript">alert("Username atau password anda salah!");</script>';
    }
    ?>
    <form action="./login.php" method="post">
        <div class="username">
            <span>Username</span>
            <br>
            <input type="text" class="textfield" name="username" id="username">
        </div>
        <div class="password">
            <span>Password</span>
            <br>
            <input type="password" class="textfield" name="password" id="password">
        </div>
        <input class="login-btn" type="submit" value="Masuk">
    </form>
</body>
</html>