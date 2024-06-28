<?php
if(isset($_POST['pdf_data'])) {
    $pdf_data = base64_decode($_POST['pdf_data']);
    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="file.pdf"');
    header('Content-Length: ' . strlen($pdf_data));
    echo $pdf_data;
} else {
    // Handle jika data tidak ditemukan
    echo "Data file PDF tidak ditemukan.";
}
?>
