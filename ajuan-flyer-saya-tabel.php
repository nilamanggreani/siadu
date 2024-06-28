<?php
include "session.php";
include "koneksi.php";

// Pastikan pengguna sudah login
if(isset($_SESSION['nama_user'])) {
    $nama_pengaju = $_SESSION['nama_user'];

    // Mengambil ajuan yang sesuai dengan pengguna
    $sql = "SELECT * FROM pengajuan WHERE nama_pengaju = '$nama_pengaju' AND (jenis_ajuan = 'flyer' OR jenis_ajuan = 'buat flyer') ORDER BY id_ajuan ASC";
    $hasil = mysqli_query($koneksi, $sql);
    $no = 0;
} else {
    // Jika pengguna belum login, arahkan ke halaman login
    header("Location: masuk.php");
    exit();
}
?>
