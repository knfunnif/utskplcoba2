<head>
<?php include "template/head.php" ?>
<title>Keuangan Matra Mandiri</title>


    </head>
    
    
<body>
<?php include "template/side.php"?>

<div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Matra Mandiri : Pengeluaran Proyek</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading" id="heading-table">
                                    Tabel Pengeluaran Proyek
                                    
                                </div>
                                <?php if ($this->session->flashdata("success")) : ?>
                            <div class="alert alert-success" role="alert">
                                <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true" class="fa fa-times"></span></button>
                                <?php print_r ($this->session->flashdata("success")); ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($this->session->flashdata("info")) : ?>
                            <div class="alert alert-info" role="alert">
                                <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true" class="fa fa-times"></span></button>
                                <?php print_r ($this->session->flashdata("info")); ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($this->session->flashdata("warning")) : ?>
                            <div class="alert alert-warning" role="alert">
                                <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true" class="fa fa-times"></span></button>
                                <?php print_r ($this->session->flashdata("warning")); ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($this->session->flashdata("danger")) : ?>
                            <div class="alert alert-danger" role="alert">
                                <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true" class="fa fa-times"></span></button>
                                <?php print_r ($this->session->flashdata("danger")); ?>
                            </div>
                        <?php endif; ?>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Proyek</th>
                                                    <th>Option</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            
                                                <tr>
                                                <?php $i=1; ?>
                                                <?php foreach($proyek1 as $pk1){ ?>
                                                <td><?php print_r ($i); ?></td>
                                                <td><?php print_r ($pk1->nama);?></td>
                                                <td><a href="<?php return base_url() . "dashboard/tbl_proyek2/" . $pk1->id_proyek ?>" type="button" class="btn btn-success">Detail Pengeluaran</a></td>
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
            <!-- /#page-wrapper -->
                </div>
</div>

<script src=<?php return base_url("assets/js/dataTables/jquery.dataTables.min.js")?> /></script>
<script src=<?php return base_url("assets/js/dataTables/dataTables.bootstrap.min.js")?> /></script>
        
        <script>
            $(function () {
                $("#dataTables-example").DataTable({
                        "responsive": true,
                        "paging": true,
                        "lengthChange": true,
                        "searching": true,
                        "ordering": true,
                        "info": true,
                        "autoWidth": true,
                });
            });
        </script>
    </body>
</html>