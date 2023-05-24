<?php 

$serverName = "localhost";
$username = "root";
$password = "";
$dbName = "pemweb_tugas_1";

$conn = new mysqli($serverName, $username, $password, $dbName);

if ($conn->connect_error) {
    exit(1);
}