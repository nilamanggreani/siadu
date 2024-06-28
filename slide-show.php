<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\user\slide-show.css">
</head>

<body>
<?php
// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT bukti_foto, isi_aduan FROM pengaduan";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $foto = isset($row['bukti_foto']) ? $row['bukti_foto'] : null;
        $nama_slide = $row['isi_aduan'];
        if ($foto) {
            echo '<div class="slide-container">';
            echo '<img class="mySlides" src="data:image/jpeg;base64,' . base64_encode($foto) . '">';
            echo '<div class="slide-description">' . htmlspecialchars($nama_slide, ENT_QUOTES, 'UTF-8') . '</div>'; // Deskripsi slide
            echo '</div>';
        }
    }
}

$conn->close();
?>  
</body>

</html>