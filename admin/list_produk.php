<?php
include '../koneksi.php';

// query untuk mengambil data produk dari tabel produk
$query = "SELECT id_produk, nama_produk, harga, deskripsi, foto FROM produk";
// menjalankan query dan menampilkan hasil dlm variabel result
$result = mysqli_query($db, $query);

// mencek apakah query berhasil, jika gagal maka akan muncul pesan error
if (!$result) {
    die("Query Error: " . mysqli_error($db));
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Product List</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../css/list_p.css">
    <style>
        .table {
            color: pink;
        }

        .table-container {
            margin: 50px auto;
            max-width: 800px;

            .produk-image {
                max-width: 100px;
                max-height: 100px;
                object-fit: cover;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
        <div class="menu">
            <!-- menu navbar -->
            <a href="../home.php">Home</a>
            <a href="../register.php">Register</a>
            <a href="https://wa.me/6281234567890" target="_blank">Contact</a>
        </div>
            <!-- brand atau judul navbar -->
            <a class="navbar-brand text-dark"><span class="title">M E Y ' S M O C H I</span></a>
            <!-- button toggler untuk layar kecil -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- logout button -->
                    <li class="nav-item">
                        <a href="../logout.php" class="nav-link">
                            <i class="fas fa-sign-out-alt icon" title="Logout"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- form untuk menampilkan list produk -->
    <form method="POST">
        <div class="container">
            <!-- judul halaman -->
            <h1 class="text-center my-4">List Produk</h1>
            <div class="table-container">
                <!-- button untuk tambah produk -->
                <a href="tambah_p.php" class="btn btn-sm btn-primary">Tambah produk</a><br>
                <table class="table table-striped table-bordered"><br>
                    <thead class="table">
                        <tr>
                            <th>NO</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // mengecek apakah ada data produk dalam tabel
                        if (mysqli_num_rows($result)) {
                            // inisiasi untuk nomor urut
                            $index = 1;
                            // perulangan untuk setiap produk
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $index++ . "</td>";
                                echo "<td>" . htmlspecialchars($row['nama_produk']) . "</td>";
                                echo "<td>Rp. " . number_format($row['harga'], 0, ',', '.') . "</td>";
                                echo "<td>" . htmlspecialchars($row['deskripsi']) . "</td>";
                                echo "<td><img src='upload_foto/" . htmlspecialchars($row['foto']) . "' class='produk-image'></td>";
                                echo "<td>"
                                    . "<a href='edit.php?id_produk=" . $row['id_produk'] . "' class='btn btn-sm btn-primary'>Edit</a> "
                                    . "<a href='delete.php?id_produk=" . $row['id_produk'] . "' class='btn btn-sm btn-danger'>Hapus</a>"
                                    . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            // pesan jika tidak ada produk
                            echo "<tr><td colspan='6' class='text-center'>Produk tidak tersedia.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </form>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>