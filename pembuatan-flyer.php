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
        <link rel="stylesheet" href="css/user.css">
      </head>

      <body>
      <div id="content">
                <div style="text-align: center">
                    <h2 class="h3 mb-2 text-gray-800">PEMBUATAN FLYER</h2>
                    <hr style="border-top: 1px solid #ccc; width: 40%; margin: auto;">
                </div>
            </div>
            <br>
        <div class="container">
          <form id="buatflyerForm" action="proses-pembuatan-flyer.php" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-25">
                <label for="tanggal_ajuan">Tanggal:</label>
              </div>
              <div class="col-75">
                <input type="date" id="tanggal_ajuan" name="tanggal_ajuan" placeholder="Tanggal" required>
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="surat_permohonan">Surat Permohonan (PDF):</label>
              </div>
              <div class="col-75">
                <input type="file" id="surat_permohonan" name="surat_permohonan" accept="application/pdf" required>
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="deskripsi_iklan">Deskripsi Flyer Yang Hendak Dibuat:</label>
              </div>
              <div class="col-75">
                <textarea id="deskripsi_iklan" name="deskripsi_iklan" placeholder="Deskripsi Flyer" style="height:120px" required></textarea>
              </div>
            </div>

            <br>

            <div class="row">
              <input type="submit" value="Kirim">
            </div>
          </form>
        </div>

      </body>

      <!-- Footer -->
      <?php include "footer.php"; ?>

    </div>
    <!-- End of Main Content -->

  </div>
</body>

</html>
