<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/user/aduan-saya.css">
</head>

<body>
    <?php include "aduan-saya-tabel.php"; ?>

    <div class="container">
        <div id="content">
            <div style="text-align: center">
                <h2 class="h3 mb-2 text-gray-800">ADUAN SAYA</h2>
                <hr style="border-top: 1px solid #ccc; width: 25%; margin: auto;">
            </div>
        </div>
        <br>
        <div class="table-responsive">
            <table id="lookup" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th style="text-align: center;">No</th>
                        <th style="text-align: center;">Tanggal</th>
                        <th style="text-align: center;">Isi Aduan</th>
                        <th style="text-align: center;">Lokasi</th>
                        <th style="text-align: center;">Foto</th>
                        <th style="text-align: center;">Status Aduan</th>
                        <th style="text-align: center;">Bukti Penyelesaian</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($aduan as $index => $data) { $no = $index + 1; ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo htmlspecialchars($data["tanggal_aduan"], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($data["isi_aduan"], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($data["lokasi_aduan"], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td>
                            <a href="view-foto-aduan.php?id=<?php echo $data['id_pelapor']; ?>" target="_blank" class="btn-photo">
                                <button style="border: none; background-color: rgba(255, 255, 255, 0); color: blue;" type="submit"><i class="fas fa-image text-danger"></i> Bukti Foto</button>
                            </a>
                        </td>
                        <td>
                            <center>
                                <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modalDetail_<?php echo $data['id_pelapor']; ?>">
                                    <i class="fa fa-eye"></i> Cek Status
                                </a>
                            </center>
                        </td>
                        <td>
                            <?php if ($data["status_aduan"] == "selesai" && !empty($data["bukti_penyelesaian"])) { ?>
                            <a href="view-foto-aduan-penyelesaian.php?id=<?php echo $data['id_pelapor']; ?>" target="_blank" class="btn-photo">
                                <button style="border: none; background-color: rgba(255, 255, 255, 0); color: blue;" type="submit"><i class="fas fa-image text-danger"></i> Bukti Penyelesaian</button>
                            </a>
                            <?php } ?>
                        </td>
                    </tr>

                    <!-- Modal Detail -->
                    <div class="modal fade" id="modalDetail_<?php echo $data['id_pelapor']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalDetailLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalDetailLabel">Detail Status Aduan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="track">
                                        <div class="step <?php echo ($data["status_aduan"] == "menunggu konfirmasi" || $data["status_aduan"] == "diproses" || $data["status_aduan"] == "selesai") ? "active" : ""; ?>">
                                            <span class="icon"><i class="fa fa-hourglass-half"></i></span>
                                            <span class="text">Menunggu Konfirmasi</span>
                                        </div>
                                        <div class="step <?php echo ($data["status_aduan"] == "diproses" || $data["status_aduan"] == "selesai") ? "active" : ""; ?>">
                                            <span class="icon"><i class="fa fa-spinner"></i></span>
                                            <span class="text">Diproses</span>
                                        </div>
                                        <div class="step <?php echo ($data["status_aduan"] == "selesai") ? "active" : ""; ?>">
                                            <span class="icon"><i class="fa fa-check"></i></span>
                                            <span class="text">Selesai</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success" data-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Footer -->
    <?php include "footer.php"; ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>

</html>