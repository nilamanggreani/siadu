<?php
// Mulai sesi
include "session.php";
include "koneksi.php";

// Query ambil data pengguna berdasarkan id_user yang disimpan dalam sesi
$id_user = $_SESSION['id_user'];
$query = "SELECT nama_user, notelp_user, email_user, level FROM users WHERE id_user='$id_user'";
$result = mysqli_query($koneksi, $query);

if ($result) {
    // Ambil data pengguna
    $row = mysqli_fetch_assoc($result);
} else {
    // Jika query gagal, berikan nilai default
    $row = array(
        'nama_user' => '',
        'notelp_user' => '',
        'email_user' => '',
        'level' => ''
    );
}
?>