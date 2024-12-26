<?php

//set this true if its local dev
$localdev = false; //kena bila handak local dev di vs code set ini jadi true

$_SERVER = "localhost";
$_user = $localdev ? "root" : "meys_mochi";
$_password = $localdev ? "" : "zP5M@ep-8^MzJocw";
$nama_database = $localdev ? "mochi" : "meys_mochi"; 

$db = mysqli_connect($_SERVER, $_user, $_password, $nama_database);

if (!$db) {
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}
