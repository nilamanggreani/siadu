<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css\sb-admin-2.css">
  <style>
    /* Tambahkan gaya CSS untuk menu navbar yang aktif */
    .navbar-nav .dropdown-item.active {
        background-color: transparent; /* Warna latar belakang untuk menu aktif */
        color: #28a745; /* Warna teks untuk menu aktif */
        border-bottom: 2px solid #28a745; /* Garis bawah untuk menu aktif */
    }
  </style>
</head>
<body>
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>
    <a class="navbar-brand" style="margin-top: 45px; margin-left: 25px;" href="beranda.php">
        <img src="png/logo.png" alt="Logo" style="height: 100px;">
    </a>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto" id="navbarMenu">
        <!-- <div class="topbar-divider d-none d-sm-block"></div> -->

        <!-- Nav Item - User Information -->
        <a class="dropdown-item" href="beranda.php">
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

        <div class="dropdown">
            <a class="mr-2 d-none d-lg-inline text-gray-600 small">User</a>
            <div class="dropdown-content">
                <a href="profil.php">Edit Profil</a>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Keluar</a>
            </div>
        </div>

    </ul>
</nav>

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
</script>
</body>
</html>
