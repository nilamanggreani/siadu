<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    .card-komentar {
      max-height: 300px; 
    }
  </style>
</head>


<?php 
session_start(); // Memulai sesi
include "head.php"; 
?>

<?php 
// Periksa apakah pengguna sudah login
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
  include "navbar-user.php"; 
} else {
  include "navbar.php"; 
}
?>

<body id="page-top">

  <!-- Content -->
  <div id="content">

  <div style="text-align: center">
      <h2 class="h3 mb-2 text-gray-800">DETAIL ADUAN</h2>
      <hr style="border-top: 1px solid #ccc; width: 30%; margin: auto;"> <!-- Garis panjang -->
    </div>
  </div>

  <!-- Main Content -->
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-6">
        <div class="row">
          <?php
          // Periksa apakah parameter id_pelapor ada dalam URL
          if(isset($_GET['id_pelapor'])) {
            $id_pelapor = $_GET['id_pelapor'];
            include("koneksi.php");

            // Periksa koneksi
            if ($conn->connect_error) {
              die("Koneksi gagal: " . $conn->connect_error);
            }

            // Buat kueri SQL untuk mengambil data pengaduan
            $sql = "SELECT * FROM pengaduan WHERE id_pelapor = $id_pelapor";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                $nama = $row['nama_pelapor'];
                $tanggal_aduan = $row['tanggal_aduan'];
                $lokasi_aduan = $row['lokasi_aduan'];
                $isi_aduan = $row['isi_aduan'];
                $foto_aduan = $row['bukti_foto'];
                $bukti_penyelesaian = $row['bukti_penyelesaian'];
                $status_aduan = $row['status_aduan'];

                // Set ikon dan warna status sesuai dengan jenisnya
                if ($status_aduan == "menunggu konfirmasi") {
                    $status_icon = "hourglass-half";
                    $status_color = "orange";
                } elseif ($status_aduan == "diproses") {
                    $status_icon = "spinner";
                    $status_color = "blue";
                } elseif ($status_aduan == "selesai") {
                    $status_icon = "check-circle";
                    $status_color = "green";
                } else {
                    $status_icon = "question-circle"; // Default jika status tidak dikenali
                    $status_color = "black";
                }
          ?>
                <div class="col-md-12 mb-4">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                          <small class="text-muted"><i class="fas fa-user-circle icon"></i> <?php echo $nama; ?></small>
                          <small class="text-muted ml-3"><i class="fas fa-map-marker-alt"></i> <?php echo $lokasi_aduan; ?></small>
                          <small class="text-muted ml-3">
                            <i class="fas fa-<?php echo $status_icon; ?>" style="color: <?php echo $status_color; ?>;"></i> 
                            <span style="color: <?php echo $status_color; ?>;"><?php echo $status_aduan; ?></span>
                          </small>
                        </div>
                        <small class="text-muted"> <?php echo $tanggal_aduan; ?></small>
                      </div>
                      <p class="card-text" style="color: black;"><?php echo $isi_aduan; ?></p>
                      <img src="data:image/jpeg;base64,<?php echo base64_encode($foto_aduan); ?>" class="card-img-top img-fluid" alt="Foto Aduan" style="max-height: 200px; object-fit: cover;">
                      <br>
                      <br>
                      <p class="card-text" style="color: black;">Bukti Penyelesaian:</p>
                      <?php if (!empty($bukti_penyelesaian)) { ?>
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($bukti_penyelesaian); ?>" class="card-img-top img-fluid" alt="Bukti Foto Penyelesaian" style="max-height: 200px; object-fit: cover;">
                      <?php } else { ?>
                        <p style="color: #1cc88a;">Belum tersedia.</p>
                      <?php } ?>
                    </div>
                    <div class="card-footer">

                      <div class="row mt-2">
                        <div class="col-md-12">
                          <form method="post" action="">
                            <div class="input-group">
                              <input type="text" class="form-control" name="komentar" placeholder="Komentar...">
                              <div class="input-group-append">
                              <?php
                              // Periksa apakah pengguna sudah login
                              if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                              ?>
                                <button class="btn btn-success" type="submit" name="submit_komentar">
                                  <i class="fas fa-arrow-right ml-2"></i>
                                </button>
                              <?php
                              } else {
                              ?>
                                <a href="masuk.php" class="btn btn-success btn-more">
                                  <i class="fas fa-arrow-right ml-2"></i>
                                </a>
                              <?php
                              }
                              ?>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <br>
          <?php
              }
              $sql_komentar = "SELECT k.isi_komentar, k.waktu_komentar, u.nama_user FROM komentar k JOIN users u ON k.id_user = u.id_user WHERE k.id_aduan = $id_pelapor";
              $result_komentar = $conn->query($sql_komentar);

              if ($result_komentar->num_rows > 0) {
                while($row_komentar = $result_komentar->fetch_assoc()) {
                  $komentar = $row_komentar['isi_komentar'];
                  $nama_user = $row_komentar['nama_user'];
                  $waktu_komentar = $row_komentar['waktu_komentar'];
                ?>
                 <div class="col-md-12 mb-2">
                  <div class="card">
                    <div class="card-footer">
                      <div class="row">
                        <div class="col-auto">
                          <small class="text-muted"><i class="fas fa-user-circle icon"></i> <?php echo htmlspecialchars($nama_user); ?></small>
                        </div>
                        <div class="col text-right">
                          <small class="text-muted"><?php echo date('d-m-Y. H:i', strtotime($waktu_komentar)); ?></small>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <small class="text-muted"><?php echo nl2br(htmlspecialchars($komentar)); ?></small>
                    </div>
                  </div>
                </div>
                <?php
                }
              } else {
                echo "<p class='text-center'>Belum ada komentar untuk aduan ini.</p>";
              }
            } else {
              echo "<p class='text-center'>Tidak ada detail aduan yang tersedia.</p>";
            }
            $conn->close();
          } else {
            echo "<p class='text-center'>ID aduan tidak ditemukan.</p>";
          }
          ?>
        </div>
      </div>
    </div>
  </div>

</div>

<!-- Footer -->
<?php include "footer.php"; ?>

<?php
// Kode PHP untuk menyimpan komentar ke database
if(isset($_POST['submit_komentar'])) {
    include("koneksi.php");

    $komentar = $_POST['komentar'];
    $komentar = mysqli_real_escape_string($conn, $komentar);
    $id_user = $_SESSION['id_user']; // Asumsikan ID pengguna disimpan dalam sesi setelah login

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    $sql_insert_komentar = "INSERT INTO komentar (id_aduan, id_user, isi_komentar, waktu_komentar) VALUES ('$id_pelapor', '$id_user', '$komentar', NOW())";

    if ($conn->query($sql_insert_komentar) === TRUE) {
        echo "<script>alert('Komentar berhasil ditambahkan');</script>";
        echo "<meta http-equiv='refresh' content='0'>";
    } else {
        echo "Error: " . $sql_insert_komentar . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
</body>

</html>
