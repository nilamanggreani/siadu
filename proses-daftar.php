<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Memeriksa apakah semua input dari form telah diisi
    if (!empty($_POST['nama_user']) && !empty($_POST['notelp_user']) && !empty($_POST['email_user']) && !empty($_POST['password_user'])) {
        // Mengambil setiap nilai data dari formulir
        $nama_user = $_POST['nama_user'];
        $notelp_user = $_POST['notelp_user'];
        $email_user = $_POST['email_user'];
        $password_user = $_POST['password_user'];

        // Menetapkan level pengguna menjadi = user
        $level = "user";

        if (!filter_var($email_user, FILTER_VALIDATE_EMAIL)) {
            echo "Format email tidak valid!";
            exit();
        }
        // untuk menjaga keamanan password
        $salt = random_bytes(16); 
        $salt = bin2hex($salt); 
        $hashed_password = password_hash($password_user . $salt, PASSWORD_DEFAULT);

        include "koneksi.php";

        // Menyimpan data ke dalam database
        $sql = "INSERT INTO users (nama_user, notelp_user, email_user, password_user, salt, level) 
                VALUES
                ('$nama_user', '$notelp_user', '$email_user', '$hashed_password', '$salt', '$level')";
        if ($conn->query($sql) === TRUE) {
            $conn->close();
            // Memberikan pesan sukses
            echo "<script>alert('Pendaftaran berhasil!');</script>";
            echo "<script>window.location.href = 'masuk.php';</script>";
            exit();
        } 
    }
}
?>
