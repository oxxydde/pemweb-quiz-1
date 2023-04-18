<?php 

class dataMhs {
    public function __construct() {
        $isAdmin = $_COOKIE["user"] == "admin";
        include 'v_data-mhs.php';
    }
}