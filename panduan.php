<!DOCTYPE html>
<html lang="en">

<?php 
session_start(); // Memulai sesi
include "head.php"; 
?>

<?php 
// Periksa apakah pengguna sudah login?
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
  include "navbar-user.php"; 
} else {
  include "navbar.php"; 
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <head>
    <link rel="stylesheet" href="css/user/panduan.css">
  </head>

  <body>
    <div id="content">
                <div style="text-align: center">
                    <h2 class="h3 mb-2 text-gray-800">KATEGORI PANDUAN</h2>
                    <hr style="border-top: 1px solid #ccc; width: 30%; margin: auto;">
                </div>
            </div>
            <br>

    <div class="container">
      <ul class="new-ul-class" style="background-color: transparent;">
        <li><a class="menu-item active" href="#layanan-pengaduan" onclick="showContent('layanan-pengaduan', this)">Layanan Pengaduan</a></li>
        <li><a class="menu-item" href="#videotron" onclick="showContent('videotron', this)">Videotron</a></li>
        <li><a class="menu-item" href="#flyer" onclick="showContent('flyer', this)">Flyer</a></li>
        <li><a class="menu-item" href="#saran" onclick="showContent('saran', this)">Saran</a></li>
      </ul>

      <div id="layanan-pengaduan" class="content" style="margin-bottom: 40px; margin-left:20%; padding:1px 16px; height:350px; color: #858796;">
        <img style="height: 105%; margin-left: 100px" src="png/pengaduan.png" alt="">
      </div>

      <div id="videotron" class="content" style="margin-bottom: 20px; margin-left:20%; padding:1px 16px; height:370px; display:none; color: #858796;">
        <img style="height: 100%; margin-left: 100px" src="png/videotron.png" alt="">
        <br>
        Unduh Surat Permohonan
        <a href="files/surat-permohonan.docx" download><i style="color: #28a745;" class="fas fa-download"></i></a>
      </div>

      <div id="flyer" class="content" style="margin-bottom: 20px; margin-left:20%; padding:1px 16px; height:370px; display:none; color: #858796;">
        <img style="height: 100%; margin-left: 100px" src="png/flyer.png" alt="">
        <br>
        Unduh Surat Permohonan
        <a href="files/surat-permohonan.docx" download><i style="color: #28a745;" class="fas fa-download"></i></a>
      </div>

      <div id="saran" class="content" style="margin-bottom: 20px; margin-left:20%; padding:1px 16px; height:370px; display:none; color: #858796;">
        <img style="height: 100%; margin-left: 100px" src="png/pan.saran.png" alt="">
      </div>
    </div>

    <script>
      function showContent(contentId, element) {
        // Remove 'active' class from all menu items
        var menuItems = document.querySelectorAll('.menu-item');
        menuItems.forEach(function(item) {
          item.classList.remove('active');
        });
        // Add 'active' class to the clicked menu item
        element.classList.add('active');

        // Hide all content divs
        var contents = document.getElementsByClassName("content");
        for (var i = 0; i < contents.length; i++) {
          contents[i].style.display = "none";
        }
        // Show the clicked content
        document.getElementById(contentId).style.display = "block";
      }
    </script>

  </body>
  
  <!-- Footer -->
  <?php include "footer.php"; ?>

</html>
