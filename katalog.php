<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="css/katalog.css">

  <!-- google fonts noto -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

  <title>MEY'S MOCHI</title>
  <style>
    .produk-item {
      display: flex;
      flex-direction: column;
      /* Stack image and text vertically */
      align-items: center;
    }

    .produk-item img {
      width: 100%;
      /* Full width for responsiveness */
      max-width: 200px;
      /* Limit image size */
      height: 50%;
      border-radius: 10px;
      /* Optional: Rounded corners */
      object-fit: cover;
    }

    .produk-deskripsi {
      margin-top: 10px;
      /* Space between image and description */
      text-align: center;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a href="home.php" class="btn me-3"><i class="fas fa-arrow-left"></i></a>
      <a class="navbar-brand text-dark"><span class="title">M E Y ' S M O C H I</span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link text-dark" href="login.php">LOGIN</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Produk Section -->
  <div class="container mt-4">
    <h2 class="text-center mb-4">DAIFUKU MOCHI</h2>
    <form method="POST" class="search-form d-flex">
      <input type="text" name="search" class="form-control me-2" placeholder="Pencarian" value="<?= htmlspecialchars($_POST['search'] ?? '') ?>" required>
      <button type="submit" class="btn btn-secondary" value="search">
        <img src="search.svg" alt="Search Icon" class="icon-style">
      </button>
    </form>
    </form><br>
    <div class="row justify-content-center">
      <?php

      include 'koneksi.php';
      $cari = $_POST['search'] ?? '';
      $keyword = "SELECT * FROM produk WHERE nama_produk LIKE '%$cari%'";
      $result = mysqli_query($db, $keyword);
      while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="col-md-3 produk-item">
          <!-- Gambar Produk -->
          <img src="admin/upload_foto/<?php echo htmlspecialchars($row['foto']); ?>"
            alt="<?php echo htmlspecialchars($row['nama_produk']); ?>">

          <!-- Deskripsi Produk -->
          <div class="produk-deskripsi">
            <h5><?php echo htmlspecialchars($row['nama_produk']); ?></h5>
            <a href="detail_p.php?id=<?php echo $row['id_produk']; ?>">Lihat</a>
          </div>
        </div>
      <?php }

      ?>
    </div>
  </div>

  <?php include 'footer.php'; ?>

  <!-- Link Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>