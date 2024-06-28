<?php
include "session.php";
?>
<!-- Add this script in the head section, after including other scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

<!DOCTYPE html>
<html lang="en">

<?php include "head.php";?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include "menu.php"; ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include "navbar.php"; ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Laporan</h1>

            <!-- Search Form -->
            <form style="padding-left: 40px; padding-top: 10px;" method="post" action="">
              <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="start_date">Start Date:</label>
                  <input type="date" class="form-control" id="start_date" name="start_date" required>
                </div>
                <div class="form-group col-md-3">
                  <label for="end_date">End Date:</label>
                  <input type="date" class="form-control" id="end_date" name="end_date" required>
                </div>
                <div class="form-group col-md-2">
                  <label>&nbsp;</label>
                  <button type="submit" class="btn btn-primary form-control" name="search">Search</button>
                </div>
                <div style="padding-top: 32px;" class="form-group col-md-2">
    <label>&nbsp;</label>
    <button type="button" class="btn btn-success" onclick="printReport()">Cetak Laporan</button>
</div>

              </div>
            </form>

            <div class="tab-content" id="nav-tabContent">
              <div class="tab-content pl-3" id="nav-tabContent">
                <div class="tab-pane fade show active" id="custom-nav-a" role="tabpanel" aria-labelledby="custom-nav-a-tab">
                  <div class="card-body">
                    <?php
                    // Check if the search button is clicked
                    if (isset($_POST['search'])) {
                      $start_date = $_POST['start_date'];
                      $end_date = $_POST['end_date'];

                      $query2 = "SELECT * FROM pengaduan WHERE tanggal_aduan BETWEEN '$start_date' AND '$end_date'";
                      $tampil1 = mysqli_query($koneksi, $query2) or die(mysqli_error($koneksi));

                      $query3 = "SELECT * FROM pengajuan WHERE tanggal_ajuan BETWEEN '$start_date' AND '$end_date'";
                      $tampil2 = mysqli_query($koneksi, $query3) or die(mysqli_error($koneksi));

                      // Menampilkan tabel setelah tombol Search ditekan
                      echo '<table id="example" class="table table-hover table-bordered">';
                      echo '<thead bgcolor="eeeeee" align="center">';
                      echo '<tr>';
                      echo '<th>No</th>';
                      echo '<th>Nama</th>';
                      echo '<th>Tanggal</th>';
                      echo '<th>Jenis Laporan</th>';
                      echo '<th>Status</th>';
                      echo '</tr>';
                      echo '</thead>';
                      echo '<tbody>';

                      $no = 0;
                      while ($data1 = mysqli_fetch_array($tampil1)) {
                        $no++;
                        echo '<tr>';
                        echo '<td>' . $no . '</td>';
                        echo '<td>' . $data1['nama_pelapor'] . '</td>';
                        echo '<td>' . date('d-m-Y', strtotime($data1['tanggal_aduan'])) . '</td>';
                        echo '<td>' . $data1['jenis_aduan'] . '</td>';
                        echo '<td>' . $data1['status_aduan'] . '</td>';
                        echo '</tr>';
                      }

                      while ($data1 = mysqli_fetch_array($tampil2)) {
                        $no++;
                        echo '<tr>';
                        echo '<td>' . $no . '</td>';
                        echo '<td>' . $data1['nama_pengaju'] . '</td>';
                        echo '<td>' . date('d-m-Y', strtotime($data1['tanggal_ajuan'])) . '</td>';
                        echo '<td>' . $data1['jenis_ajuan'] . '</td>';
                        echo '<td>' . $data1['status_ajuan'] . '</td>';
                        echo '</tr>';
                      }

                      echo '</tbody>';
                      echo '</table>';
                    }
                    ?>
                    
                    <!-- Footer -->
                    <?php include "footer.php"; ?>

                    <script>
    function printReport() {
        window.print();
    }
</script>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
