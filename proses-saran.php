<?php

include("koneksi.php");

// Mulai sesi
session_start();

// Cek apakah pengguna sudah login atau belum
if (!isset($_SESSION['nama_user']) || !isset($_SESSION['notelp_user'])) {
    // Jika belum login, redirect ke halaman masuk.php
    header("Location: masuk.php");
    exit; // Pastikan skrip berhenti setelah melakukan redirect
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai yang dikirimkan melalui formulir
    $nama_lengkap = $_POST['nama_lengkap'];
    $isi_saran = $_POST['isi_saran'];
    // Ambil tanggal saat ini
    $tanggal_saran = date('Y-m-d');
    
    // Add data ke tabel pengaduan
    $sql = "INSERT INTO saran (nama_lengkap, isi_saran, tanggal_saran) 
            VALUES ('$nama_lengkap', '$isi_saran', '$tanggal_saran')";

    // Jalankan query
    if (mysqli_query($conn, $sql)) {
        // Jika berhasil, tampilkan pesan sukses
        echo "<script>alert('Terima kasih atas saran Anda.'); 
        window.location.href = 'saran.php';</script>";
    } else {
        // Jika gagal, tampilkan pesan error
        echo "<script>alert('Error: " . mysqli_error($conn) . "'); 
        window.location.href = 'saran.php';</script>";
    }

    // Tutup koneksi ke database
    mysqli_close($conn);
}
?>
