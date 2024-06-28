<?php
// Mulai sesi
include "session.php";

include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data yang dikirimkan melalui formulir
    $nama_user = $_POST['nama_user'];
    $notelp_user = $_POST['notelp_user'];
    $email_user = $_POST['email_user'];

    // Query update data
    $id_user = $_SESSION['id_user'];
    $query = "UPDATE users SET nama_user='$nama_user', notelp_user='$notelp_user', email_user='$email_user' WHERE id_user='$id_user'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        // Berhasil, tampilkan pesan sukses
        echo "<script>alert('Data profil berhasil diperbarui.'); 
        window.location.href = 'profil.php';</script>";
    } else {
        // Gagal, tampilkan pesan error
        echo "<script>alert('Error: " . mysqli_error($conn) . "'); 
        window.location.href = 'profil.php';</script>";
    }
} else {
    header("location: profil.php");
}
?>