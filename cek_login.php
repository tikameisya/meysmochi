<?php
session_start(); // Memulai sesi untuk menyimpan data sesi (session variables)
$_SESSION['sesi'] = NULL; // Menetapkan nilai session 'sesi' menjadi NULL, kemungkinan untuk mengatur ulang sesi lama.

include "koneksi.php"; // Menyertakan file koneksi untuk menghubungkan ke database

if (isset($_POST['submit'])) { // Mengecek apakah form telah disubmit
    $user = isset($_POST['username']) ? $_POST['username'] : ""; // Mengambil username dari form, jika ada
    $pass = isset($_POST['password']) ? $_POST['password'] : ""; // Mengambil password dari form, jika ada
    $qry = mysqli_query($db, "SELECT * FROM admin WHERE username = '$user' AND password = '$pass'"); // Query untuk mencocokkan username dan password di database
    $sesi = mysqli_num_rows($qry); // Mengecek jumlah baris yang ditemukan, apakah ada admin yang cocok dengan username dan password

    if ($sesi == 1) { // Jika ditemukan satu baris data admin yang cocok
        $data_admin = mysqli_fetch_array($qry); // Mengambil data admin yang sesuai
        $_SESSION['id_admin'] = $data_admin['id_admin']; // Menyimpan ID admin ke dalam session
        $_SESSION['sesi'] = $data_admin['nama']; // Menyimpan nama admin ke dalam session

        echo "<script>alert('Anda berhasil Log In');</script>"; // Menampilkan alert berhasil login
        echo "<meta http-equiv='refresh' content='0; url=admin/list_produk.php?admin=$sesi'>"; // Redirect ke halaman list produk admin
    } else { // Jika username dan password tidak ditemukan di database
        echo "<meta http-equiv='refresh' content='0; url=login.php'>"; // Redirect kembali ke halaman login
        echo "<script>alert('Anda Gagal Log In')</script>"; // Menampilkan alert gagal login
    }
} else {
    include "login.php"; // Jika tidak ada data yang disubmit, menampilkan halaman login
}
?>
