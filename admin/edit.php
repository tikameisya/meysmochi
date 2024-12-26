<?php
include '../koneksi.php';

// mendapat id produk
$id_produk = $_GET['id_produk'];
// membuat query untuk mendapatkan data produk berdasarkan id
$query = "SELECT * FROM produk where id_produk = '$id_produk'";
// menjalankan query dan menyimpan hasil
$result = mysqli_query($db, $query);
// mengambil data hasil query sebagai array assosiatif
$data = mysqli_fetch_assoc($result);

// mengecek apakah produk memiliki foto; jika tidak, memakai gambar default
if (empty($data['foto']) or ($data['foto'] == '-'))
    // gambar default jika tidak ada foto
    $foto = "produk-no-foto.jpg";
else {
    // foto produk tersedia
    $foto = $data['foto'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- membuat halaman responsif -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- judul halaman -->
    <title>Edit Produk</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- container utama dengan margin atas -->
    <div class="container mt-5">
        <!-- judul halaman dengan margin bawah -->
        <h2 class="text-center mb-4">Edit Produk</h2>

        <!-- membuat card untuk form -->
        <div class="card">
            <!-- area konten dari card -->
            <div class="card-body">
                <!-- form untuk mengedit produk -->
                <form method="POST" action="edit_proses.php" enctype="multipart/form-data">
                    <!-- input nama produk -->
                    <div class="mb-3">
                        <label for="nama_produk" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?php echo $data['nama_produk']; ?>" required>
                    </div>
                    <!-- input id produk sebagai hidden input -->
                    <div class="mb-3">
                        <input type="hidden" class="form-control" id="id_produk" name="id_produk" value="<?php echo $data['id_produk'] ?>" required>
                    </div>
                    <!-- input harga produk -->
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" class="form-control" id="harga" name="harga" value="<?php echo $data['harga']; ?>" required>
                    </div>
                    <!-- input deskripsi produk -->
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required><?php echo $data['deskripsi']; ?></textarea>
                    </div>
                    <!-- input untuk mengganti foto produk -->
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto Produk (opsional)</label>
                        <input type="file" class="form-control" id="foto" name="foto">
                        <small class="text-muted">Biarkan kosong jika tidak ingin mengganti foto.</small>
                        <br>
                        <!-- menampilkan foto yang ada -->
                        <img src="upload_foto/<?php echo $data['foto']; ?>" alt="Foto Produk" class="img-thumbnail mt-2" width="150" >
                        <!-- hidden input untuk menyimpan nama file foto sebelumnya -->
                        <input type="hidden" name="foto_prtm" value="<?php echo $data['foto'];?>">
                    </div>
                    <div class="text-center">
                        <!-- button update -->
                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                        <!-- button cancel -->
                        <a href="list_produk.php" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>