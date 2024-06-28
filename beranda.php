<!DOCTYPE html>
<html lang="en">
  
<?php 
session_start(); // Memulai sesi
include "head.php"; 

// Periksa apakah pengguna sudah login?
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      </head>

      <body>
        <div class="container">

          <!-- Carousel -->
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="png/banner3.png" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="png/banner3.png" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="png/banner3.png" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <!-- End of Carousel -->

            <br>
            <br>
               <!-- Content -->
               <div id="content">
                <div style="text-align: center">
                    <h2 class="h3 mb-2 text-gray-800">BUAT PENGADUAN ATAU PENGAJUAN</h2>
                    <hr style="border-top: 1px solid #ccc; width: 55%; margin: auto;">
                </div>
            </div>
            <br>

            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="counter">
                            <span class="counter-value"><i class="fas fa-exclamation-triangle"></i></span> 
                            <h3><a style="color: green;" href="aduan.php">Buat Pengaduan</a></h3>
                        </div>
                        <br>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="counter">
                            <span class="counter-value"><i class="fas fa-video"></i></span> 
                            <h3><a style="color: green;" href="videotron.php">Buat Pengajuan Videotron</a></h3>
                        </div>
                        <br>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="counter">
                            <span class="counter-value"><i class="fas fa-image"></i></span> 
                            <h3><a style="color: green;" href="flyer.php">Buat Pengajuan Flyer</a></h3>
                        </div>
                        <br>
                    </div>
                </div
            </div>

            <div id="content">
                <div style="text-align: center">
                    <h2 class="h3 mb-2 text-gray-800">CEK STATUS</h2>
                    <hr style="border-top: 1px solid #ccc; width: 25%; margin: auto;">
                </div>
            </div>
            <br>
            <br>

          <div class="row">
            <div class="col-md-3 col-sm-6">
              <div class="counter">
                <span class="counter-value"><i class="fas fa-exclamation-circle"></i></span> 
                <h3 style="color: #555;">
                  Aduan Saya <br>
                  <a style="color: green;" href="aduan-saya.php">Cek Status</a>
                </h3>
              </div>
              <br>
            </div>

            <div class="col-md-3 col-sm-6">
              <div class="counter">
                <span class="counter-value"><i class="fas fa-tv"></i></span> 
                <h3 style="color: #555;">
                  Ajuan Videotron Saya <br>
                  <a style="color: green;" href="ajuan-videotron-saya.php">Cek Status</a>
                </h3>
              </div>
              <br>
            </div>

            <div class="col-md-3 col-sm-6">
              <div class="counter">
                <span class="counter-value"><i class="fas fa-file"></i></span>
                <h3 style="color: #555;">
                  Ajuan Flyer Saya <br>
                  <a style="color: green;" href="ajuan-flyer-saya.php">Cek Status</a>
                </h3>
              </div>
              <br>
            </div>

          </div>
          <br>
          <?php include "view-pengaduan.php"; ?>
        </div>
      </body>
    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <?php include "footer.php"; ?>
    <?php include "footer-info.php"; ?>
    
    <!-- jQuery DataTables initialization script -->
    <script>
      $(document).ready(function() {
        var dataTable = $('#lookup').DataTable( {
          "processing": true,
          "serverSide": true,
          "ajax":{
            url :"ajax-data-user.php", 
            type: "post", 
            error: function(){  // error handling
              $(".lookup-error").html("");
              $("#lookup").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
              $("#lookup_processing").css("display","none");
            }
          }
        });
      });
    </script>
  </div>
</body>
</html>