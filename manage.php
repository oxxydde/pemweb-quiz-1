<?php 

require './controller/Admin.php';

if (isset($_POST["method"])) {
    echo Admin::handle($_POST);
}