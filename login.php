<?php 

require './controller/c_login.php';

if (isset($_POST["username"])) {
    c_login::login($_POST);
} else if (isset($_GET["logout"])) {
    c_login::logout();
} else {
    c_login::invoke();
}