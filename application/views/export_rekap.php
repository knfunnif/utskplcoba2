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
            <td align ="center">
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
        LAPORAN REKAPITULASI
    </p>

    <div class="col-lg-2">
        <div style="font-size: 10px;">
            <h3 style="font-size: 10px;">Tabel Pengeluaran Luar Proyek</h3>
            <table class="table table-bordered">
                <tr>
                    <th>No.</th>
                    <th>Bulan</th>
                    <th>Pengeluaran</th>
                </tr>
                <tbody>
                    <?php foreach ($kantor2 as $k) :
                    ?>
                        <tr>
                            <td><?php print_r ($k->id_kantor); ?></td>
                            <td><?php print_r ($k->bulan) ?></td>
                            <td><?php $k->sum;
                                $total =  $k->sum;
                                print_r ($total1 = "Rp " .  number_format($total, 0, ",", "."));
                                ?></td> ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th style="text-align:right;" colspan="2">Total</th>
                        <th id="totrek" style="text-align:left;" colspan="1">
                            <?php foreach ($totkantor as $tk) { ?>
                                <?php $tk->sum;
                                $total = $tk->sum;
                                print_r ($total = "Rp " .  number_format($total, 0, ",", "."));
                                ?>
                        </th>
                    </tr>
                <?php } ?>
                </tfoot>
            </table>
        </div>
    </div>

    <!-- ------------------------------------------------------------------------------------------------------- -->

    <div class="col-lg-4">
        <div style="font-size: 10px;">
            <h3 style="font-size: 10px;">Tabel Profit Per Proyek</h3>
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Nama Proyek</th>
                    <th>Pemasukan</th>
                    <th>Pengeluaran</th>
                    <th>Profit</th>
                </tr>
                </thead>
                <tbody>
                    
                        <?php foreach ($masuk22 as $m2 => $key) { ?>
                            <tr>
                            <td><?php print_r ($key->id_sub) ?></td>
                            <td><?php print_r ($key->proyek); ?></td>
                            <td><?php $masuk = $key->sum;
                                print_r ($masuk1 = "Rp " . number_format($masuk, 0, ",", "."));
                                ?></td>
                            <td><?php $keluar = $proyek2[$m2]->sum;
                                print_r ($keluar1 = "Rp " . number_format($keluar, 0, ",", "."));
                                ?></td>
                            <td><?php $profit = $masuk - $keluar;
                                print_r ($profit = "Rp " . number_format($profit, 0, ",", ".")); ?>
                            </td>
                    </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th style="text-align:right;" colspan="4">Total</th>
                        <?php foreach ($totm as $tm) { ?>
                                <?php $masuk = $tm->sum; ?>
                            <?php } ?>
                            <?php foreach ($totk as $tm) { ?>
                                <?php $keluar = $tm->sum; ?>
                            <?php } ?>
                        <th id="totrek" style="text-align:left;" colspan="1">
                            <?php $total = $masuk - $keluar;
                            print_r ($profit = "Rp " . number_format($total, 0, ",", ".")); ?>
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <div class="container-fluid">
        <div class="col-lg-12" id="profitproyekrek1">
            Company"s Profits :
            <div id="hasil">
                <?php foreach ($totm as $tm) { ?>
                    <?php $masuk = $tm->sum ?>
                <?php } ?>
                <?php foreach ($totk as $tk) { ?>
                    <?php $keluar = $tk->sum ?>
                <?php } ?>
                <?php foreach ($totkantor as $tkk) { ?>
                    <?php $total = $tkk->sum; ?>
                <?php } ?>
                <?php $comprof = ($masuk - $keluar) - $total;
                print_r ($profit = "Rp " . number_format($comprof, 0, ",", ".")); ?>

            </div>
        </div>
    </div>

</body>

</html>