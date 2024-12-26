<?php
include '../koneksi.php';

// menangkap data yang dikirim melalui form
// id produk yang akan diupdate
$id_produk = $_POST['id_produk']; 
// nama produk baru
$nama_produk = $_POST['nama_produk'];
// harga produk baru
$harga = $_POST['harga'];
// deskripsi produk
$deskripsi= $_POST['deskripsi'];

// mengecek apakah tombol update di tekan
if (isset($_POST['update'])) {
    // menjadikan data yang dikirim menjadi variabel
    extract($_POST);
    // mendapat nama file yang diupload
    $nama_file = $_FILES['foto']['name'];

    // mengecek apakah ada file yang diupload
    if (!empty($nama_file)) {
        // lokasi sementara file
        $lokasi_file = $_FILES['foto']['tmp_name'];
        // tipe file (ekstensi)
        $tipe_file = pathinfo($nama_file, PATHINFO_EXTENSION);
        // menyusun nama file baru berdasar id produk
        $file_foto = $id_produk . "." . $tipe_file;

        // menentukan folder tujuan untuk menyimpan file
        $folder = "upload_foto/$file_foto";
        // menghapus file lama jika ada nama yang sama
        @unlink("$folder");
        // memindahkan file dari lokasi sementara ke lokasi tujuan
        move_uploaded_file($lokasi_file, "$folder");
    } else{
        // jika tidak ada file baru maka menggunakan file pertama
        $file_foto = "$foto_prtm";
}
    // membuat query untuk mengupdat data produk
    $sql = "UPDATE produk SET nama_produk = '$nama_produk', harga = '$harga', deskripsi = '$deskripsi', foto = '$file_foto' WHERE id_produk= '$id_produk'";
    // menjalankan query update
    $query = mysqli_query($db, $sql);

    // setelah proses selesai diarahkan ke halaman list produk
    header("location:list_produk.php?p=produk");
} ?>

