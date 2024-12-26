<?php
?>
<!DOCTYPE html>
<html>

<head>
  <!-- Meta tag untuk membuat tampilan responsif pada perangkat mobile -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Menyertakan Bootstrap CSS untuk styling elemen-elemen HTML -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Menyertakan file CSS khusus untuk halaman login -->
  <link rel="stylesheet" type="text/css" href="css/login.css">

  <!-- google fonts noto -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Judul halaman login -->
  <title>Login</title>
</head>

<body>
  <!-- Navbar yang menggunakan Bootstrap -->
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">

      <!-- Teks judul pada navbar, tidak memiliki link, hanya teks -->
      <a class="nav-link text-dark"><span class="title">M E Y ' S M O C H I </span></a>

      <!-- Tombol untuk toggle navbar ketika tampilan pada layar kecil -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Menu navigasi yang dapat diperluas pada perangkat besar -->
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <!-- Item menu logout, mengarah ke logout.php -->
          <li class="nav-item">
            <a class="nav-link text-dark" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Div utama yang akan menampilkan form login di tengah halaman -->
  <div class="d-flex justify-content-center align-items-center" style="height: 80vh;">
    <!-- Card untuk menampilkan form login dengan tampilan center -->
    <div class="card">
      <div class="card-body text-center">

        <!-- Judul halaman login -->
        <h1 class="mt-3">LOGIN</h1>

        <!-- Form untuk login, mengirim data menggunakan metode POST ke cek_login.php -->
        <form method="POST" action="cek_login.php">

          <!-- Form input untuk username -->
          <div class="mb-3" style="width: 300px;">
            <input type="text" id="username" name="username" class="form-control" placeholder="Username" required>
          </div>

          <!-- Form input untuk password -->
          <div class="mb-3">
            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
          </div>

          <!-- Tombol submit untuk mengirim data login -->
          <button type="submit" name="submit" class="btn btn-primary">Masuk</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Menyertakan footer dari file footer.php, jika ada -->
  <?php
  include 'footer.php';
  ?>

  <!-- Menyertakan Bootstrap JS untuk interaktivitas halaman -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
?>