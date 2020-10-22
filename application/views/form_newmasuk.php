<?php include "template/head.php" ?>
<title>Keuangan Matra Mandiri</title>

    </head>
    
    
<body>
<?php include "template/side.php"?>

<div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Matra Mandiri</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Form Anggaran
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form role="form" action="<?php return base_url()."dashboard/input_proyek"; ?>" method="post">
                                                <div class="form-group">
                                                    <label>Nama Proyek</label>
                                                    <input type="text" name="namaproyek" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Anggaran</label>
                                                    <input type="number" name="anggaran" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                <button type="submit" value="Tambah" class="btn btn-default">Submit</button>
                                                <button type="reset" class="btn btn-default">Reset</button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.col-lg-6 (nested) -->
                                    </div>
                                    <!-- /.row (nested) -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->