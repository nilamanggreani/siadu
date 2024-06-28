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

      <div id="content">
                <div style="text-align: center">
                    <h2 class="h3 mb-2 text-gray-800">PENAYANGAN FLYER</h2>
                    <hr style="border-top: 1px solid #ccc; width: 30%; margin: auto;">
                </div>
            </div>
            <br>
      <div class="container">
        <form id="flyerForm" action="proses-penayangan-flyer.php" method="post" enctype="multipart/form-data">
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
              <label for="dokumen_iklan">Flyer:</label>
            </div>
            <div class="col-75">
              <input type="file" id="dokumen_iklan" name="dokumen_iklan" accept="image/*" required>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="deskripsi_iklan">Deskripsi Flyer:</label>
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

      <!-- Footer -->
      <?php include "footer.php"; ?>

      <script>
        $(document).ready(function() {
          var dataTable = $('#lookup').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
              url: "ajax-data-user.php", // json datasource
              type: "post", // method  , by default get
              error: function() { // error handling
                $(".lookup-error").html("");
                $("#lookup").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                $("#lookup_processing").css("display", "none");
              }
            }
          });
        });
      </script>

    </div>
    <!-- End of Main Content -->

  </div>
</body>

</html>