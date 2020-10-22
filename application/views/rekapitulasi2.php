<head>
    <?php include "template/head.php" ?>
    <title>Keuangan Matra Mandiri</title>

</head>


<body>
    <?php include "template/side.php" ?>

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="col-lg-12">
                <div class="row">
                    <h1 class="page-header">Matra Mandiri</h1>
                    <?php foreach ($kantor1 as $k) {?>
                    <a href="<?php return base_url("Dashboard/export_rekap/").$k->tahun ?>"><button class="btn" id="exportrekap"><i class="fa fa-file-pdf-o"></i> Export to PDF</button></a>
                    <?php }?>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="col-lg-4">
                    <div class="row">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Tabel Pengeluaran di Luar Proyek
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Bulan</th>
                                                <th>Pengeluaran</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php $i = 1; ?>
                                                <?php foreach ($kantor as $ktr) { ?>
                                                    <td><?php print_r ($i) ?></td>
                                                    <td><?php print_r ($ktr->bulan); ?></td>
                                                    <td><?php $ktr->sum;
                                                        $total =  $ktr->sum;
                                                        print_r ($total1 = "Rp " .  number_format($total, 0, ",", "."));
                                                        ?></td>
                                            </tr>
                                            <?php $i++; ?>
                                        <?php } ?>
                                        <!-- /.panel-heading -->
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th style="text-align:right;" colspan="2">Total</th>
                                                <th id="totrek" style="text-align:left;" colspan="2">
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
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-7" id="rekapprofit">
                    <div class="row">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Profit per Proyek
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama Proyek</th>
                                                <th>Pemasukan</th>
                                                <th>Pengeluaran</th>
                                                <th>Profit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php $i = 1; ?>
                                                <?php foreach ($masuk2 as $m2 => $key) { ?>
                                                    <td><?php print_r ($i); ?></td>
                                                    <td><?php print_r ($key->proyek); ?></td>
                                                    <td><?php $masuk = $key->sum;
                                                        print_r ($masuk1 = "Rp " . number_format($masuk, 0, ",", "."));
                                                        ?></td>
                                                    <td><?php $keluar = $proyek[$m2]->sum;
                                                        print_r ($keluar1 = "Rp " . number_format($keluar, 0, ",", "."));
                                                        ?></td>
                                                        <td><?php $profit= $masuk-$keluar;
                                                            print_r ($profit = "Rp " . number_format($profit, 0, ",", "."));?>
                                                        </td>
                                            </tr>
                                            <?php $i++;
                                            ?>
                                        <?php } ?>

                                        <!-- /.panel-heading -->
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th style="text-align:right;" colspan="4">Total Profit</th>
                                                <th id="totrek" style="text-align:right;" colspan="2">
                                                <?php foreach ($totm as $tm){?>
                                                    <?php $masuk = $tm->sum?>
                                                    <?php } ?>
                                                <?php foreach ($totk as $tm){?>
                                                    <?php $keluar = $tm->sum?>
                                                    <?php } ?>
                                                <?php $total=$masuk-$keluar;
                                                        print_r ($profit = "Rp " . number_format($total, 0, ",", "."));?>
                                                </th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.panel-body -->
                        </div>



                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-6 -->
                </div>
                <!-- /#page-wrapper -->
            </div>

        </div>
        <!-- /#wrapper -->
        <div class="container-fluid">
            <div class="col-lg-12" id="profitproyekrek">
                Company"s Profits :
            <div id="hasil">
                <?php foreach ($totm as $tm){?>
                    <?php $masuk = $tm->sum?>
                <?php } ?>
                <?php foreach ($totk as $tk){?>
                    <?php $keluar = $tk->sum?>
                <?php } ?>
                <?php foreach ($totkantor as $tkk) { ?>
                    <?php $total = $tkk->sum;?>
                <?php } ?>
                <?php $comprof = ($masuk-$keluar)-$total;
                    print_r ($profit = "Rp " . number_format($comprof, 0, ",", "."));?>
                
            </div>
        </div>
    </div>