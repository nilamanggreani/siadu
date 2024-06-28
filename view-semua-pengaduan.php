<!DOCTYPE html>
<html lang="en">
<head>
  <?php 
  session_start(); // Start the session
  include "head.php"; 
  ?>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/view-pengaduan.css">
  <link rel="stylesheet" href="css/user.css">
</head>
<body id="page-top">

  <!-- Navigation Bar -->
  <?php 
  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    include "navbar-user.php"; // Include user navbar if logged in
  } else {
    include "navbar.php"; // Include default navbar if not logged in
  }
  ?>

  <!-- Content -->
  <div id="content">
    <div style="text-align: center">
      <h2 class="h3 mb-2 text-gray-800">ADUAN SUKSES</h2>
      <hr style="border-top: 1px solid #ccc; width: 30%; margin: auto;">
    </div>
  </div>
  <br>

  <!-- Main Content -->
  <div class="container py-5">
    <div class="row">
      <?php
      include("koneksi.php");

      // Check database connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      // SQL query to retrieve complaints data
      $sql = "SELECT id_pelapor, nama_pelapor, tanggal_aduan, lokasi_aduan, isi_aduan FROM pengaduan";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $id_pelapor = $row['id_pelapor'];
          $nama = $row['nama_pelapor'];
          $tanggal_aduan = $row['tanggal_aduan'];
          $lokasi_aduan = $row['lokasi_aduan'];
          $isi_aduan = $row['isi_aduan'];

          // Truncate isi_aduan if longer than 50 characters
          if (strlen($isi_aduan) > 50) {
            $isi_aduan = substr($isi_aduan, 0, 25) . "...";
          }
      ?>
          <div class="col-md-4 mb-4">
            <div class="card">
              <div class="card-body">
                <small class="text-muted"><i class="fas fa-user-circle icon"></i> <?php echo $nama; ?></small>
                <br>
                <small class="text-muted"><i class="fas fa-exclamation-triangle"></i> <?php echo $isi_aduan; ?></small>
                <span>
                  <small class="text-muted"><a href="baca-aduan.php?id_pelapor=<?php echo $id_pelapor; ?>">Baca Selengkapnya</a></small>
                </span>
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-md-6">
                    <small class="text-muted"><i class="fas fa-calendar-alt"></i> <?php echo $tanggal_aduan; ?></small>
                  </div>
                  <div class="col-md-6 text-right">
                    <small class="text-muted"><i class="fas fa-map-marker-alt"></i> <?php echo $lokasi_aduan; ?></small>
                  </div>
                </div>
              </div>
            </div>
          </div>
      <?php
        }
      } else {
        echo "No complaints found.";
      }
      $conn->close();
      ?>
    </div>
  </div>

  <!-- Footer -->
  <?php include "footer.php"; ?>

</body>
</html>
