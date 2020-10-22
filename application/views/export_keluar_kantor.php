<!DOCTYPE html>
<html>

<head>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Laporan</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style>
            .line-title {
                border: 0;
                border-style: inset;
                border-top: 1px solid #000;
            }
        </style>
    </head>
</head>

<body>
    <!-- <img src="assets/img/logo-bmkg.png" style="position: absolute; width: 60px; height: auto;"> -->
    <table style="width: 100%;">
        <tr>
            <td align="center">
            <img src="assets/img/mm1.jpg" style="position: center; width: 80px; height: auto; padding: -15px">
            <br>
                <span style="line-height: 2.5; font-weight:bold;">
                    MATRA MANDIRI
                </span><br>
                <small>Jasa Analisis Mengenai Dampak Lingkungan</small>
                <br>
            </td>
        </tr>
    </table>
    <hr class="line-title">
    <p align="center">
        LAPORAN PENGELUARAN KANTOR
    </p>
    <div style="font-size: 10px;">
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Tanggal</th>
                <th>Keperluan</th>
                <th>Status Bayar</th>
                <th>Kota</th>
                <th>Nominal</th>
                <th>Proyek</th>
                <th>Nota</th>
                <!-- <th>Nota</th> -->
            </tr>
            <tbody>
                <?php foreach ($kantor_keluar as $kk) :
                ?>
                    <tr>
                    <?php
                        $hari = $kk->tanggal;
                        $bulan = $kk->bulan;
                        $tahun = $kk->tahun;
                    ?>
                        <td><?php print_r ($kk->id_kantor); ?></td>
                        <td><?php print_r ($hari." ".$bulan." ".$tahun); ?></td>
                        <td><?php print_r ($kk->keperluan) ?></td>
                        <td><?php print_r ($kk->stat_bayar) ?></td>
                        <td><?php print_r ($kk->kota) ?></td>
                        <td><?php print_r ($kk->pengeluaran) ?></td>
                        <td><?php print_r ($kk->proyek) ?></td>
                        <td><img src="/xampp/htdocs/cobain/upload/data/<?php print_r ($kk->nota) ?>"style="position: center; width: 100px; height: auto;"></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>

</html>