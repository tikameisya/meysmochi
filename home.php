<?php
// Koneksi ke database
include 'koneksi.php';

// Query untuk mengambil data produk
$query = "SELECT * FROM produk LIMIT 3";
$result = mysqli_query($db, $query);

// Jika query gagal
if (!$result) {
  die("Query Error: " . mysqli_error($db));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="css/home.css">
  <link rel="stylesheet" href="css/fontawesome.min.css">

  <!-- google fonts noto -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

  <title>MEY'S MOCHI</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg" aria-label="Offcanvas navbar large">
    <div class="container-fluid">
      <a class="navbar-brand fs-2 fw-bold" href="home.php">Mey's Mochi</a>
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
              <a class="nav-link" href="./home.php">Home</a>
            </li>
            <li class="nav-item z-1">
              <a class="nav-link" href="./katalog.php">Katalog</a>
            </li>
            <li class="nav-item z-1">
              <a class="nav-link" href="https://wa.me/6285845691423" target="_blank">Contact</a>
            </li>
            <li class="nav-item z-1">
              <a class="nav-link" href="./login.php">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>


  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <div class="container mt-4">
    <img src="image/banner.png" alt="Banner" class="img-fluid mb-4" style="width: 100%; height:500px">
  </div>

  <div class="container mt-5">
    <div class="align-items-center">
      <div class="row justify-content-center">
        <?php
        // Loop untuk menampilkan setiap produk dalam card
        while ($row = mysqli_fetch_assoc($result)) {
          $id = htmlspecialchars($row['id_produk']);
          $nama = htmlspecialchars($row['nama_produk']);
          $harga = htmlspecialchars($row['harga']);
          $gambar = htmlspecialchars($row['foto']);
          $harga_format = number_format($harga, 0, ',', '.'); // Format harga

          echo "
            <div class='col-md-3'>
                <div class='card mb-4'>
                    <img src='admin/upload_foto/$gambar' class='card-img-top' alt='$nama'>
                    <div class='card-body text-center'>
                        <h5 class='card-title'>$nama</h5>
                        <p class='card-text'>Rp. $harga_format</p>
                        <a href='detail_p.php?id=$id; ?>'class='btn btn-primary'>Lihat</a>
                    </div>
                </div>
            </div>";
        }
        ?>
      </div>
    </div>
  </div>
  <div style="text-align:center;">
    <a href="katalog.php">Lihat lebih lengkap</a>
  </div>
  <h2 class="text-center mb-4 mt-5">DAIFUKU MOCHI</h2>
  <?php
  include 'footer.php';
  ?>

  <!-- Link Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>