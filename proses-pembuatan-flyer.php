<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "koneksi.php";
    session_start();

    if (!isset($_SESSION['nama_user']) || !isset($_SESSION['notelp_user'])) {
        // Jika belum login, redirect ke halaman masuk.php
        header("Location: masuk.php");
        exit; 
    }
    // Mendapatkan nama_pengaju dari sesi
    $nama_pengaju = $_SESSION['nama_user'];

    $tanggal_ajuan = $_POST['tanggal_ajuan'];
    $surat_permohonan_name = $_FILES['surat_permohonan']['name'];
    $surat_permohonan_tmp = $_FILES['surat_permohonan']['tmp_name'];
    $deskripsi_iklan = $_POST['deskripsi_iklan'];

    // Buka dan baca file sebagai data biner
    $surat_permohonan_data = file_get_contents($surat_permohonan_tmp);

    // Escape karakter khusus dalam data biner
    $surat_permohonan_data = mysqli_real_escape_string($conn, $surat_permohonan_data);

    // Masukkan ke dalam tabel pengajuan
    $sql = "INSERT INTO pengajuan (nama_pengaju, tanggal_ajuan, jenis_ajuan, surat_permohonan, deskripsi_iklan) 
            VALUES ('$nama_pengaju', '$tanggal_ajuan', 'buat flyer', '$surat_permohonan_data', '$deskripsi_iklan')";
    $stmt = mysqli_prepare($conn, $sql);

    // Jalankan query
    if (mysqli_stmt_execute($stmt)) {
        // Tampilkan pesan, jika sukses
        echo "<script>alert('Permohonan pembuatan flyer berhasil dibuat.'); 
        window.location.href = 'ajuan-flyer-saya.php';</script>"; // arahkan ke cek status
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
