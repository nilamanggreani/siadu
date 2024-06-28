<?php
include "koneksi.php"; // Gantilah dengan nama file koneksi yang benar

$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];

$query = "SELECT * FROM produk WHERE tgl_produksi BETWEEN '$startDate' AND '$endDate'";
$result = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
  $data[] = $row;
}

echo json_encode($data);
?>
