<?php

if (isset($_GET["logout"])) {
    require 'c_login.php';
    login::logout();
}
require 'c_data-mhs.php';
$dataMhs = new dataMhs();

?>