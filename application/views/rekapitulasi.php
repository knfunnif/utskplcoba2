<head>
<?php include "template/head.php" ?>
<title>Keuangan Matra Mandiri</title>

    </head>
    
    
<body>
<?php include "template/side.php"?>

<div id="page-wrapper">
                <div class="container-fluid">
                  <div class="col-lg-12">
                    <div class="row">

                            <h1 class="page-header">Matra Mandiri</h1>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="col-lg-10" id="heading">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Tabel Rekapitulasi
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive table-bordered">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    
                                                    <th>No</th>
                                                    <th>Tahun</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                <?php $i=1; ?>
                                                <?php foreach ($masuk2 as $k){?>
                                                    <td><?php print_r ($i)?></td>
                                                    <td><?php print_r ($k->tahun)?></td>
                                                    <td><a href="<?php return base_url() . "dashboard/tbl_rekap2/" . $k->tahun?>" type="button" class="btn btn-success">Detail</a></td>
                                                </tr>
                                                <?php $i++; ?>
                                                <?php }?>
                                            </tbody>
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