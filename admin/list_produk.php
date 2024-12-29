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
    <!-- google fonts noto -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
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
    <nav class="navbar navbar-expand-lg" aria-label="Offcanvas navbar large">
        <div class="container-fluid">
            <a class="navbar-brand fs-2 fw-bold" href="../home.php">Mey's Mochi</a>
            <button class="navbar-toggler z-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar2" aria-controls="offcanvasNavbar2" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar2" aria-labelledby="offcanvasNavbar2Label">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbar2Label">Menu</h5>
                    <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item z-1">
                            <a class="nav-link" href="../home.php">Home</a>
                        </li>
                        <li class="nav-item z-1">
                            <a class="nav-link" href="../katalog.php">Katalog</a>
                        </li>
                        <li class="nav-item z-1">
                            <a class="nav-link" href="https://wa.me/6285845691423" target="_blank">Contact</a>
                        </li>
                        <!-- logout button -->
                        <li class="nav-item">
                            <a href="../logout.php" class="nav-link">
                                <i class="fas fa-sign-out-alt icon" title="Logout"></i>
                            </a>
                        </li>
                    </ul>
                </div>
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