<?php 

require './controller/c_login.php';

$login = new login();

if (isset($_POST["username"])) {
    $login->login($_POST);
} else {
    $login->invoke();
}

?>