<?php
// Koneksi ke database
$localhost = 'localhost';
$username = 'root';
$password = '';
$dbname = 'ruangalat';

$conn = mysqli_connect($localhost, $username, $password, $dbname);

if(!$conn){
    die("Koneksi Gagal: ".mysqli_connect_error());
}

?>


