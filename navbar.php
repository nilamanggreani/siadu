<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/sb-admin-2.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/user/navbar.css">
</head>

<body>
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn d-md-none rounded-circle mr-3" style="color: #28a745;">
        <i class="fa fa-bars"></i>
    </button>
    <a class="navbar-brand" style="margin-top: 45px; margin-left: 25px;" href="index.php">
        <img src="png/logo.png" alt="Logo" style="height: 100px;">
    </a>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto" id="navbarMenu">
        <!-- <div class="topbar-divider d-none d-sm-block"></div> -->

        <!-- Nav Item - User Information -->
        <a class="dropdown-item" href="index.php">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Beranda</span>
        </a>

        <a class="dropdown-item" href="panduan.php">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Panduan</span>
        </a>

        <a class="dropdown-item" href="aduan.php">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Pengaduan</span>
        </a>

        <a class="dropdown-item" href="videotron.php">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Videotron</span>
        </a>

        <a class="dropdown-item" href="flyer.php">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Flyer</span>
        </a>

        <a class="dropdown-item" href="saran.php">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Saran</span>
        </a>

        <a class="dropdown-item" href="masuk.php">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Masuk</span>
        </a>
    </ul>
</nav>

<!-- elemen sidebar -->
<div id="sidebar" class="d-md-none" style="display: none;">
  <ul class="list-group">
    <li class="list-group-item"><a href="index.php">Beranda</a></li>
    <li class="list-group-item"><a href="panduan.php">Panduan</a></li>
    <li class="list-group-item"><a href="daftar.php">Daftar</a></li>
    <li class="list-group-item"><a href="masuk.php">Masuk</a></li>
  </ul>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
  // Ambil URL halaman saat ini
  var currentUrl = window.location.href;

  // Cari elemen menu yang sesuai dengan URL halaman saat ini
  var menuItems = document.querySelectorAll('#navbarMenu a');

  menuItems.forEach(function(item) {
      // Jika URL halaman saat ini cocok dengan href dari elemen menu, tambahkan kelas 'active'
      if (item.href === currentUrl) {
          item.classList.add('active');
      }
  });

  // Fungsionalitas untuk toggle sidebar
  document.getElementById('sidebarToggleTop').addEventListener('click', function() {
      var sidebar = document.getElementById('sidebar');
      if (sidebar.style.display === 'none' || sidebar.style.display === '') {
          sidebar.style.display = 'block';
      } else {
          sidebar.style.display = 'none';
      }
  });
</script>

</body>
</html>
