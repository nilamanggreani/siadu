<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Foto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: black;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            max-width: 800px;
            padding: 20px;
        }

        .image-container {
            text-align: center;
            margin-top: 20px;
        }

        img {
            max-width: 100%;
            height: auto;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .message {
            text-align: center;
            margin-top: 20px;
            font-size: 18px;
            color: #555;
        }
    </style>
</head>
<body>
    <?php
    // Mengambil id_pelapor dari URL
    $id_pelapor = isset($_GET['id']) ? $_GET['id'] : '';

    // Memuat file koneksi database
    include "koneksi.php";

    // Membuat query untuk mengambil data foto dari database berdasarkan id_pelapor
    $sql = "SELECT bukti_penyelesaian FROM pengaduan WHERE id_pelapor = $id_pelapor";
    $result = mysqli_query($conn, $sql);

    // Memeriksa apakah query berhasil dieksekusi dan data ditemukan
    if ($result && mysqli_num_rows($result) > 0) {
        // Mengambil data foto
        $data = mysqli_fetch_assoc($result);
        // Menampilkan foto
        echo '<div class="container">';
        echo '<div class="image-container">';
        echo '<img src="data:image/jpeg;base64,' . base64_encode($data['bukti_penyelesaian']) . '" />';
        echo '</div>';
        echo '</div>';
    } else {
        echo '<div class="container">';
        echo '<div class="message">Foto tidak ditemukan.</div>';
        echo '</div>';
    }

    // Menutup koneksi database
    mysqli_close($conn);
    ?>
</body>
</html>
