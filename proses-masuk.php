<?php
session_start();
include("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['email_user']) && !empty($_POST['password_user'])) {
        $email_user = $_POST['email_user'];
        $password_user = $_POST['password_user'];

        // Mengambil data email dalam tabel user
        $sql = "SELECT * FROM users WHERE email_user='$email_user'";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $hashed_password = $row['password_user'];
            $salt = $row['salt'];

            if (password_verify($password_user . $salt, $hashed_password)) {
                $_SESSION['id_user'] = $row['id_user'];
                $_SESSION['nama_user'] = $row['nama_user'];
                $_SESSION['notelp_user'] = $row['notelp_user'];
                $_SESSION['email_user'] = $row['email_user'];
                $_SESSION['level'] = $row['level'];
                $_SESSION['loggedin'] = true;

                // Jika berhasil, langsung diarahkan ke beranda
                header('Location: beranda.php');
                exit();
            }
        }

        $conn->close();
    }
}
?>
