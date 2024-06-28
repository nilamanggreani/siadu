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

<body id="page-top">

  <!-- Main Content -->
  <div id="content">

    <!-- Begin Page Content -->
    <div class="container-fluid">

      <head>
        <link rel="stylesheet" href="css\user.css">
      </head>

      <body>
       <div id="content">
                <div style="text-align: center">
                    <h2 class="h3 mb-2 text-gray-800">BUAT PENGADUAN</h2>
                    <hr style="border-top: 1px solid #ccc; width: 30%; margin: auto;">
                </div>
            </div>
            <br>
        <div class="container">
          <form id="aduanForm" action="proses-aduan.php" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-25">
                <label for="tanggal_aduan">Tanggal:</label>
              </div>
              <div class="col-75">
                <input type="date" id="tanggal_aduan" name="tanggal_aduan" placeholder="Tanggal" required>
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="lokasi_aduan">Lokasi:</label>
              </div>
              <div class="col-75">
                <input type="text" id="lokasi_aduan" name="lokasi_aduan" placeholder="Lokasi" required>
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="isi_aduan">Isi Aduan:</label>
              </div>
              <div class="col-75">
                <textarea id="isi_aduan" name="isi_aduan" placeholder="Aduan" style="height:150px" required></textarea>
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="bukti_foto">Bukti Foto:</label>
              </div>
              <div class="col-75">
                <input type="file" id="bukti_foto" name="bukti_foto" accept="image/*" required>
              </div>
            </div>
            <div class="row">
              <input type="submit" value="Kirim">
            </div>
          </form>
        </div>
      </body>


      <!-- Footer -->
      <?php include "footer.php"; ?>


    </div>

</body>

</html>
