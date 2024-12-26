<?php
include '../koneksi.php';


$id_produk = $_POST['id_produk'];
$nama_produk = $_POST['nama_produk'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];

if (isset($_POST['simpan'])) {
    extract($_POST);
    $nama_file = $_FILES['foto']['name'];
    if (!empty($nama_file)) {
        $lokasi_file = $_FILES['foto']['tmp_name'];
        $tipe_file = pathinfo($nama_file, PATHINFO_EXTENSION);
        $file_foto = $id_produk . "." . $tipe_file;

        $folder = "upload_foto/$file_foto";
        move_uploaded_file($lokasi_file, "$folder");
    } else
        $file_foto = "-";

    $sql = "INSERT INTO produk VALUES ('$id_produk', '$nama_produk', '$harga', '$deskripsi', '$file_foto')";
    $query = mysqli_query($db, $sql);

    header("location: list_produk.php");
}

mysqli_close($db);

                  
?>
