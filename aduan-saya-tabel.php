<?php
include "session.php";
include "koneksi.php";

// Pastikan pengguna sudah login
if (isset($_SESSION['nama_user'])) {
    $nama_pelapor = $_SESSION['nama_user'];

    // Mengambil aduan yang sesuai dengan pengguna
    $sql = "SELECT * FROM pengaduan WHERE nama_pelapor = '$nama_pelapor' ORDER BY id_pelapor ASC";
    $hasil = mysqli_query($conn, $sql);
    $no = 0;
} else {
    // Jika pengguna belum login, arahkan ke halaman login
    header("Location: masuk.php");
    exit();
}
?>

<?php
// Pisahkan variabel yang akan digunakan di HTML
$aduan = [];
while ($data = mysqli_fetch_array($hasil)) {
    $aduan[] = $data;
}
?>

<!-- Include head, navbar, dan footer -->
<?php include "head.php"; ?>
<?php include "navbar-user.php"; ?>
