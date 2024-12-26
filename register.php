<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/regist.css">
  <!-- google fonts noto -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <title></title>
</head>

<body>
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand text-dark"><span class="title">M E Y ' S M O C H I</span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link text-dark" href="login.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav><br>

  <div class="d-flex justify-content-center align-items-center" style="height: 80vh;">
    <div class="card">
      <div class="card-body text-center">
        <h1 class="mt-3">REGISTER</h1>
        <form class="mb-4 mt-3" action="" method="POST">
          <div class="mb-3" style="width: 300px;">
            <input type="text" id="nama" class="form-control custom-input" placeholder="Nama">
          </div>
          <div class="mb-3">
            <input type="text" id="username" class="form-control custom-input" placeholder="Username">
          </div>
          <div class="mb-3">
            <input type="text" id="email" class="form-control custom-input" placeholder="Email">
          </div>
          <div class="mb-3">
            <input type="text" id="telp" class="form-control custom-input" placeholder="No. Telp">
          </div>
          <div class="mb-3">
            <input type="password" id="password" class="form-control custom-input" placeholder="Kata sandi">
          </div>
          <button type="button" class="btn btn-secondary w-100" onclick="window.location.href='login.php';">Buat</button>
        </form>
        <p class="mt-3">Sudah punya akun? <a href="login.php" class="link-primary">Login</a></p>
      </div>
    </div>
  </div>
  <?php
  include 'footer.php';
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
?>