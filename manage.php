<?php 

require './controller/c_mahasiswa.php';

if (isset($_POST["method"])) {
    echo c_mahasiswa::handle($_POST);
}