<?php

if (isset($_GET["logout"])) {
    require './controller/c_login.php';
    login::logout();
}
require './controller/c_data-mhs.php';
$dataMhs = new dataMhs();

?>