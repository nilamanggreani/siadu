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

        <div style="text-align: center">
          <h2 class="h3 mb-2 text-gray-800">KIRIM SARAN</h2>
          <hr style="border-top: 1px solid #ccc; width: 20%; margin: auto;">
        </div>
        </div>
        <br>

      <div class="container">
        <form id="aduanForm" action="proses-saran.php" method="post">
          <div class="row">
            <div class="col-25">
              <label for="nama_lengkap">Nama Lengkap:</label>
            </div>
            <div class="col-75">
              <input type="text" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap">
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="isi_saran">Isi Saran:</label>
            </div>
            <div class="col-75">
              <textarea id="isi_saran" name="isi_saran" placeholder="Saran" style="height:200px"></textarea>
            </div>
          </div>
          <br>
          <div class="row">
            <input type="submit" value="Kirim">
          </div>
        </form>
      </div>

    </div>
    <!-- End of Page Content -->

    <!-- Footer -->
    <?php include "footer.php"; ?>

    <script>
      $(document).ready(function() {
        var dataTable = $('#lookup').DataTable({
          "processing": true,
          "serverSide": true,
          "ajax": {
            url: "ajax-data-user.php",
            type: "post",
            error: function() {
              $(".lookup-error").html("");
              $("#lookup").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
              $("#lookup_processing").css("display", "none");
            }
          }
        });
      });
    </script>

</body>

</html>