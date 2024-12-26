<?php

$_SERVER = "localhost";
$_user = "root";
$_password = "";
$nama_database = "mochi"; 

$db = mysqli_connect($_SERVER, $_user, $_password, $nama_database);

if (!$db) {
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}
