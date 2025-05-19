<?php

$host = "localhost:3307";
$username = "root";
$password = "password";
$db = "datasiswa";



$conn = mysqli_connect($host, $username, $password, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

?>  
