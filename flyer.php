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

<head>
  <link rel="stylesheet" href="css\user.css">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body id="page-top">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">
        <div id="content">
                <div style="text-align: center">
                    <h2 class="h3 mb-2 text-gray-800">KATEGORI FLYER</h2>
                    <hr style="border-top: 1px solid #ccc; width: 25%; margin: auto;">
                </div>
            </div>
            <br>

            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="counter">
                            <span class="counter-value"><i class="far fa-file-alt"></i></span> 
                            <h3><a style="color: green;" href="pembuatan-flyer.php">Permohonan Pembuatan</a></h3>
                        </div>
                        <br>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="counter">
                            <span class="counter-value"><i class="far fa-eye"></i></span> 
                            <h3><a style="color: green;" href="penayangan-flyer.php">Permohonan Penayangan</a></h3>
                        </div>
                        <br>
                    </div>
                </div>
            </div>

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <?php include "footer.php"; ?>
        
    </div>

    <!-- Scripts -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            var dataTable = $('#lookup').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    url: "ajax-data-user.php", 
                    type: "post", 
                    error: function() { // error handling
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
