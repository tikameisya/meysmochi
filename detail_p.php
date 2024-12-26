<?php
// Koneksi ke database
include 'koneksi.php';

// Periksa apakah `id` dikirim melalui URL
if (isset($_GET['id'])) {
  $id_produk = $_GET['id'];

  // Query untuk mengambil data produk berdasarkan id
  $query = "SELECT * FROM produk WHERE id_produk = ?";
  $stmt = $db->prepare($query); // Menggunakan prepared statement untuk keamanan
  $stmt->bind_param('i', $id_produk); // Mengikat parameter `id_produk` dengan tipe integer
  // menjalankan query
  $stmt->execute();
  // mendapatkan hasil query
  $result = $stmt->get_result();

  // Periksa apakah produk ditemukan
  if ($result->num_rows > 0) {
    $produk = $result->fetch_assoc(); // Ambil data produk
  } else {
    // jika produk tidak ada maka akan tampil pesan error
    die("Produk tidak ditemukan.");
  }
} else {
  // jika id produk tidak ada maka akan tampil pesan error
  die("ID produk tidak diberikan.");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="css/detail_p.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <title>MEY'S MOCHI</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light mb-4">
    <div class="container-fluid">
      <!-- Back Button (Kembali ke katalog.php) -->
      <a href="katalog.php" class="btn me-3"><i class="fas fa-arrow-left"></i></a>

      <!-- Navbar Brand -->
      <a class="navbar-brand text-dark" href="#">
        <span class="title">M E Y ' S M O C H I</span>
      </a>
    </div>
  </nav>

  <h2 class="text-center mb-4"><?php echo htmlspecialchars($produk['nama_produk']); ?></h2>
  <div class="container mt-5">
    <div class="card mb-3 mx-auto" style="max-width: 15rem;">
      <img src="admin/upload_foto/<?php echo htmlspecialchars($produk['foto']); ?>" class="card-img-top" alt="Gambar Produk" style="width: 100%; height: auto;">
      <div class="card-body">
        <p class="card-text"><?php echo htmlspecialchars($produk['deskripsi']); ?></p>
        <p class="card-text"><strong>Rp. <?php echo number_format($produk['harga'], 0, ',', '.'); ?></strong></p>
      </div>
    </div>
  </div>
  <div class="container text-center my-3">
    <a href="https://wa.me/6285845691423?text=Halo%20saya%20ingin%20bertanya%20tentang%20produk%20<?php echo urlencode($produk['nama_produk']); ?>" class="btn btn-success" target="_blank">Beli melalui WhatsApp</a>
  </div>

  <?php
  include 'footer.php';
  ?>

  <!-- Bootstrap JS (Make sure Bootstrap JS is linked) -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

  <!-- FontAwesome JS for Icons -->
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>

</html>