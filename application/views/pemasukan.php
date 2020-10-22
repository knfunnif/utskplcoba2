<head>
    <?php include "template/head.php" ?>
    <title>Keuangan Matra Mandiri</title>

</head>


<body>
    <?php include "template/side.php" ?>

    <div id="page-wrapper">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Matra Mandiri : Data Pemasukan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" id="heading-table">
                            Tabel Proyek & Anggaran
                            <a href="<?php return base_url("dashboard/new_masuk") ?>"><button class="btn" id="button1"><i class="fa fa-plus"></i> Add Project</button></a>
                            <a href="<?php return base_url("dashboard/export_masuk1") ?>"><button class="btn" id="export"><i class="fa fa-file-pdf-o"></i> Export to PDF</button></a>

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
                                            <th>Anggaran</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <?php $i = 1; ?>
                                            <?php foreach ($pemasukan as $pm) { ?>
                                                <?php
                                                $anggaran = $pm->jumlah;
                                                $anggaran = number_format($anggaran, 0, ",", ".");
                                                ?>
                                                <td><?php print_r ($i); ?></td>
                                                <td><?php print_r ($pm->nama); ?></td>
                                                <td><?php print_r ($anggaran); ?></td>
                                                <td><a href="<?php return base_url() . "dashboard/pemasukan2/" . $pm->id_proyek ?>" type="button" class="btn btn-success">Pemasukan</a>
                                                    <a style="text-decoration: none" href="javascript:;" data-id="<?php print_r ($pm->id_proyek) ?>" data-nama="<?php print_r ($pm->nama) ?>" data-anggaran="<?php print_r ($anggaran) ?>" data-toggle="modal" data-target="#edit-data">
                                                        <button data-toggle="modal" data-target="#ubah-data" class="btn btn-warning">Edit</button>
                                                    </a>
                                                    <a onclick="deleteConfirm("<?php return base_url() . "dashboard/delete_pemasukan1/" . $pm->id_proyek ?>")" href="#" type="button" class="btn btn-danger">Delete </a></td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php } ?>

                                    </tbody>
                                </table>

                                <!-- Modal EDIT -->
                                <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                                <h4 class="modal-title">Edit Data</h4>
                                            </div>
                                            <form class="form-horizontal" action="<?php return base_url("dashboard/ubah") ?>" method="post" enctype="multipart/form-data" role="form">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label class="col-lg-2 col-sm-2 control-label">ID Proyek</label>
                                                        <div class="col-lg-10">
                                                            <input type="text" class="form-control" name="id" id="id" placeholder="" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-2 col-sm-2 control-label">Nama Proyek</label>
                                                        <div class="col-lg-10">
                                                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Tuliskan nama proyek" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-2 col-sm-2 control-label">Anggaran</label>
                                                        <div class="col-lg-10">
                                                            <input type="number" class="form-control" name="anggaran" id="anggaran" placeholder="Tuliskan jumlah anggaran" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
                                                    <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END Modal Tambah -->

                            <!-- Modal Delete -->
                            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="ModalLabel">Are you sure?</h5>
                                            <button class="close" type="button" data-dismiss="modal" id="close1" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">The data that have been deleted cannot be restored.</div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                            <a id="btn-delete" class="btn btn-danger" href="#">Yes, delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END Modal Delete -->
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

        <script src=<?php return base_url("assets/js/dataTables/jquery.dataTables.min.js") ?> />
        </script>
        <script src=<?php return base_url("assets/js/dataTables/dataTables.bootstrap.min.js") ?> />
        </script>

        <script>
            $(document).ready(function() {
                // Untuk sunting
                $("#edit-data").on("show.bs.modal", function(event) {
                    var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
                    var modal = $(this)

                    // Isi nilai pada field
                    modal.find("#id").attr("value", div.data("id"));
                    modal.find("#nama").attr("value", div.data("nama"));
                    modal.find("#anggaran").attr("value", div.data("anggaran"));

                });
            });
        </script>

        <script>
            $(function() {
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

        <script>
            function deleteConfirm(url) {
                $("#btn-delete").attr("href", url);
                $("#deleteModal").modal();
            }
        </script>
</body>

</html>