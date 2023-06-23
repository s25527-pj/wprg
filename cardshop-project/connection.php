<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'cardshop';

$connection = mysqli_connect($host, $username, $password, $database);

if (!$connection) {
    die('No connection to database: ' . mysqli_connect_error());
}
?>