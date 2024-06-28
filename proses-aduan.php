<?php
include("koneksi.php");
session_start();
if (!isset($_SESSION['nama_user']) || !isset($_SESSION['notelp_user'])) {
    // Jika belum login, redirect ke halaman masuk.php
    header("Location: masuk.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai yang dikirimkan melalui formulir
    $tanggal_aduan = $_POST['tanggal_aduan'];
    $isi_aduan = $_POST['isi_aduan'];
    $lokasi_aduan = $_POST['lokasi_aduan'];

    // Ambil file yang diunggah
    $nama_file = $_FILES['bukti_foto']['name'];
    $ukuran_file = $_FILES['bukti_foto']['size'];
    $tipe_file = $_FILES['bukti_foto']['type'];
    $lokasi_file = $_FILES['bukti_foto']['tmp_name'];

    // Baca isi file
    $data = addslashes(file_get_contents($lokasi_file));

    // Ambil nama_pelapor dan no_telp dari sesi
    $nama_pelapor = $_SESSION['nama_user'];
    $no_telp = $_SESSION['notelp_user'];

    // Masukkan data ke dalam tabel pengaduan
    $sql = "INSERT INTO pengaduan (nama_pelapor, no_telp, tanggal_aduan, isi_aduan, lokasi_aduan, bukti_foto) 
            VALUES ('$nama_pelapor', '$no_telp', '$tanggal_aduan', '$isi_aduan', '$lokasi_aduan', '$data')";

    if (mysqli_query($conn, $sql)) {
        // Jika query berhasil, tampilkan pesan sukses
        echo "<script>alert('Pengaduan berhasil dilakukan.'); 
        window.location.href = 'aduan-saya.php';</script>"; // arahkan ke cek status aduan
    } 
    // Removed else statement
    mysqli_close($conn);
}
?>
