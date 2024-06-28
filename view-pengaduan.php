<!DOCTYPE html>
<html lang="en">

<?php include "head.php"; ?>

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/view-pengaduan.css">

<body id="page-top">
<div id="content">
                <div style="text-align: center">
                    <h2 class="h3 mb-2 text-gray-800">ADUAN MASUK</h2>
                    <hr style="border-top: 1px solid #ccc; width: 25%; margin: auto;">
                </div>
            </div>

  <!-- Main Content -->
  <div class="container py-5">
    <div class="row">
      <?php
      include("koneksi.php");
      
      // Ambil data pengaduan
      $sql = "SELECT id_pelapor, nama_pelapor, tanggal_aduan, lokasi_aduan, isi_aduan FROM pengaduan LIMIT 3";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $id_pelapor = $row['id_pelapor'];
          $nama = $row['nama_pelapor'];
          $tanggal_aduan = $row['tanggal_aduan'];
          $lokasi_aduan = $row['lokasi_aduan'];
          $isi_aduan = $row['isi_aduan'];

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
      }
      $conn->close();
      ?>
    </div>
    <!-- "Selengkapnya" button -->
    <div class="text-center">
      <a href="view-semua-pengaduan.php" class="btn btn-success btn-more">
        <i class="fas fa-arrow-circle-right mr-2"></i> Selengkapnya
      </a>
    </div>
  </div>

  <!-- Footer -->
  <?php include "footer.php"; ?>
</body>

</html>
