<?php
// Mulai sesi
include "profil-user.php";
?>

<!DOCTYPE html>
<html lang="en">

<?php include "head.php"; ?>

<body id="page-top">

  <!-- Main Content -->
  <div id="content">

    <!-- Topbar -->
    <?php include "navbar-user.php"; ?>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">
      <head>
        <link rel="stylesheet" href="css\user.css">
      </head>

      <body>
      <div id="content">
                <div style="text-align: center">
                    <h2 class="h3 mb-2 text-gray-800">EDIT PROFIL</h2>
                    <hr style="border-top: 1px solid #ccc; width: 20%; margin: auto;">
                </div>
            </div>
            <br>
        <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-6">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                  <div class="image-wrapper" style="padding-right: 90px; padding-top: 35px;">
                    <img class="rounded-circle" width="150px" src="png/profil.png">
                  </div>
                  <span style="padding-right: 90px;" class="custom-font-bold"><?php echo $row['level']; ?></span>
                </div>
              </div>
                  <form method="POST" action="edit-profil.php">
                    <div class="row">
                      <div class="col-md-12">
                        <label class="custom-labels">Nama Lengkap:</label>
                        <input name="nama_user" type="text" id="nama_user" value="<?php echo $row['nama_user']; ?>" placeholder="Nama Lengkap" autofocus="on" autocomplete="off" required />
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <label class="custom-labels">No. Telepon:</label>
                        <input name="notelp_user" type="text" id="notelp_user" value="<?php echo $row['notelp_user']; ?>" placeholder="Nomor Telepon" autofocus="on" autocomplete="off" required />
                      </div>
                      </div>
                      <div class="row">
                      <div class="col-md-12">
                        <label class="custom-labels">Alamat Email:</label>
                        <input name="email_user" type="text" id="email_user" value="<?php echo $row['email_user']; ?>" placeholder="Alamat Email" autofocus="on" autocomplete="off" required />
                      </div>
                    </div>
                    <div class="row mt-3">
                      <input type="submit" value="Simpan">
                  </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </body>

      <!-- Footer -->
      <?php include "footer.php"; ?>

      </html>
