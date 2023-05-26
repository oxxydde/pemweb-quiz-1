<?php 

$dbServerName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "pemweb_tugas_1";

$conn = new mysqli($dbServerName, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    echo 'mySQL connect err!';
}