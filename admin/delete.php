<?php
// menyertakan file koneksi untuk menghubungkan database
include'../koneksi.php';

// mendapatkan nilai id produk yang dikirim melalui parameter URL
$id = $_GET['id_produk'];

// membuat query SQL untuk menghapus data dari tabel 'produk' berdasarkan ID
$query = "DELETE FROM produk WHERE id_produk = '$id'";

// menjalankan query menggunakan koneksi databse
$result = mysqli_query($db, $query);

// mengecek apakah query berhasil dijalankan
if (!$result) {
    // jika terjadi kesalahan, tampilkan pesan error
    die("Query Error: " . mysqli_errno($db) . "-" . mysqli_error($db));
} else {
    // jika query berhasil, maka tampil pesan berhasil dihapus dan diarahkan ke halaman list produk 
    echo "<script>alert('Data berhasil dihapus!');window.location='list_produk.php';</script>";
}
