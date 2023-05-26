<?php 

require './controller/Admin.php';

if (isset($_POST["username"])) {
    User::login($_POST);
} else if (isset($_GET["logout"])) {
    Admin::logout();
} else {
    User::invoke();
}