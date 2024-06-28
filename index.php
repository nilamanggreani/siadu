<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
    session_start(); // Start the session
    include "head.php"; 
    ?>

    <link rel="stylesheet" href="css/user.css">
    <!-- Add Bootstrap CSS if not already included -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body id="page-top">
    <!-- Navbar -->
    <?php 
    // Check if user is logged in
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
        include "navbar-user.php"; 
    } else {
        include "navbar.php"; 
    }
    ?>
    <!-- End of Navbar -->

    <!-- Main Content -->
    <div id="content">
        <div class="container">
            <!-- <div style="text-align: center">
                <h2 class="h3 mb-2 text-gray-800">SELAMAT DATANG!</h2>
                <p class="mb-4">Sistem Informasi Layanan Pengaduan dan Pengajuan</p>
            </div> -->

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
                </div>
            </div>

            <!-- Include Pengaduan View -->
            <?php include "view-pengaduan.php"; ?>
        </div>

        <?php include "footer-info.php"; ?>

        <!-- JavaScript -->
        <!-- Add jQuery and Bootstrap JS if not already included -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <script>
            // JavaScript for existing slideshow
            var slideIndex = 0;
            showDivs(slideIndex);

            function plusDivs(n) {
                showDivs(slideIndex += n);
            }

            function showDivs(n) {
                var i;
                var x = document.getElementsByClassName("slide-container");
                if (n >= x.length) { slideIndex = 0 }
                if (n < 0) { slideIndex = x.length - 1 }
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";
                }
                for (i = slideIndex; i < slideIndex + 3; i++) {
                    x[i % x.length].style.display = "inline-block";
                }
            }
        </script>
    </div>
</body>
</html>
