<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Splash Screen</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      height: 100vh;
      margin: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: #f1a3bc; /* Background color */
    }

    .splash-screen {
      text-align: center;
    }

    .splash-logo {
      max-width: 150px;
      margin-bottom: 20px;
    }

    .splash-text {
      font-size: 1.5rem;
      font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
      color: #000000; /* Text color */
    }
  </style>
</head>
<body>
  <div class="splash-screen">
    <!-- Logo -->
    <img src="image/logo.png" alt="Logo" class="splash-logo">
    <!-- Teks -->
    <p class="splash-text">Selamat Datang di Website Kami</p>
    <script>
    // Menghubungkan ke halaman home selama 3 detik
    setTimeout(function() {
      window.location.href = "home.php"; 
    }, 3000);
  </script>
  </div>
</body>
</html>
