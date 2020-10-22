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
                                <div class="panel-heading" id="head">
                                    Detail Pengeluaran Proyek
                                    <?php foreach ($proyek1 as $p) {?>
                                    <a href = "<?php return base_url("dashboard/new_proyek/".$p->id_proyek)?>"><button class="btn" id="button1"><i class="fa fa-plus"></i>  New Outcome</button></a>
                                    <?php }?>
                                    <?php foreach ($proyek3 as $p3) {?>
                                    <a href="<?php return base_url("Dashboard/export_kproyek/") .$p3->id_proyek?>"><button class="btn" id="export"><i class="fa fa-file-pdf-o"> Export to PDF</i></button></a>
                                    <?php }?>
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tanggal</th>
                                                    <th>Proyek</th>
                                                    <th>Uraian Pengeluaran</th>
                                                    <th>Nominal</th>
                                                    <th>Nota</th>
                                                    <th>Option</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                <?php $i=1; ?>
                                                <?php foreach ($proyek2 as $pk2) { ?>
                                                        <?php
                                                            $hari = $pk2->tanggal;
                                                            $bulan = $pk2->bulan;
                                                            $tahun = $pk2->tahun;
                                                    ?>
                                                    <?php
                                                    $uang = $pk2->nominal;
                                                    $uang = number_format($uang, 0,",",".");
                                                    ?>
                                                    <td><?php print_r ($i); ?></td>
                                                    <td><?php print_r ($hari." ".$bulan." ".$tahun); ?></td>
                                                    <td><?php print_r ($pk2->proyek); ?></td>
                                                    <td><?php print_r ($pk2->uraian); ?></td>
                                                    <td><?php print_r ($uang); ?></td>
                                                    <td>
                                                    <a style="color: blue" href="<?php return base_url(). "upload/data/".$pk2->nota ?>"><?php print_r ($pk2->nota)?></a>
                                                    </td>
                                                    <td><a 
                                                        href="javascript:;"
                                                        data-id="<?php print_r ($pk2->id_keluar_proyek) ?>"
                                                        data-ket="<?php print_r ($pk2->uraian) ?>"
                                                        data-tgl= "<?php print_r ($hari) ?>"
                                                        data-bln= "<?php print_r ($bulan) ?>"
                                                        data-thn= "<?php print_r ($tahun) ?>"
                                                        data-nominal="<?php print_r ($uang) ?>"
                                                        data-nota="<?php print_r ($pk2->nota) ?>"
                                                        data-toggle="modal" data-target="#edit-data">
                                                        <button  data-toggle="modal" data-target="#ubah-data" class="btn btn-warning">Edit</button>
                                                    </a>
                                                    <a onclick="deleteConfirm("<?php return base_url() . "dashboard/delete_proyek/" . $pk2->id_keluar_proyek?>")" type="button" class="btn btn-danger">Delete</a></td>
                                                </tr>
                                                <?php $i++; ?>
                                                <?php }?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th style="text-align:right;" colspan="6">Total Pengeluaran Proyek</th>
                                                    <th style="text-align:right;" colspan="2"> <?php foreach($totalpro as $tot){
                                                        $uang1 = $tot->sum;
                                                        // $uang1 = number_format($uang1)."<br>";
                                                        print_r ($uang1);
                                                    }?></th>
                                                </tr>
                                            </tfoot>
                                            <tfoot>
                                                <tr>
                                                    <th style="text-align:right;" colspan="6">Dana Proyek</th>
                                                    <th style="text-align:right;" colspan="2">
                                                    <?php foreach($totalsub as $tot){
                                                        $uang2 = $tot->sum;
                                                        // $uang2 = number_format($uang2)."<br>";
                                                        print_r ($uang2);
                                                    }?>
                                                    </th>
                                                </tr>
                                            </tfoot>
                                            <tfoot>
                                                <tr>
                                                    <th style="text-align:right;" colspan="6">Sisa</th>
                                                    <th id="totpr" style="text-align:right;" colspan="2">
                                                    <?php
                                                    $a = $uang1;
                                                    $b = $uang2;
                                                    $uang3 = $b-$a;
                                                    $uang3 = number_format($uang3);
                                                    print_r ($uang3); ?>
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
                        
                        <!-- Modal EDIT -->
                        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                        <h4 class="modal-title">Edit Data</h4>
                                    </div>
                                    <form class="form-horizontal" action="<?php return base_url("Dashboard/ubah4") ?>" method="post" enctype="multipart/form-data" role="form">
                                    <div class="modal-body">
                                        <div class="form-group">
                                        <label class="col-lg-2 col-sm-2 control-label">ID Pengeluaran</label>
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" name="id" id="id" placeholder="" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                        <label class="col-lg-2 col-sm-2 control-label">Uraian</label>
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" name="ket" id="ket" placeholder="Tuliskan keterangan" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                        <label class="col-lg-2 col-sm-2 control-label">Tanggal</label>
                                            <div class="col-lg-10">
                                            <select name="tanggal" class="form-control" id="tanggal" required>
                                                    <option value="">Pilih Tanggal</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                        <option value="13">13</option>
                                                        <option value="14">14</option>
                                                        <option value="15">15</option>
                                                        <option value="16">16</option>
                                                        <option value="17">17</option>
                                                        <option value="18">18</option>
                                                        <option value="19">19</option>
                                                        <option value="20">20</option>
                                                        <option value="21">21</option>
                                                        <option value="22">22</option>
                                                        <option value="23">23</option>
                                                        <option value="24">24</option>
                                                        <option value="25">25</option>
                                                        <option value="26">26</option>
                                                        <option value="27">27</option>
                                                        <option value="28">28</option>
                                                        <option value="29">29</option>
                                                        <option value="30">30</option>
                                                        <option value="31">31</option>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                        <label class="col-lg-2 col-sm-2 control-label">Bulan</label>
                                            <div class="col-lg-10">
                                            <select name="bulan" class="form-control" id="tanggal" required>
                                                    <option value="">Pilih Bulan</option>
                                                        <option value="Januari">Januari</option>
                                                        <option value="Februari">Februari</option>
                                                        <option value="Maret">Maret</option>
                                                        <option value="April">April</option>
                                                        <option value="Mei">Mei</option>
                                                        <option value="Juni">Juni</option>
                                                        <option value="Juli">Juli</option>
                                                        <option value="Agustus">Agustus</option>
                                                        <option value="September">September</option>
                                                        <option value="Oktober">Oktober</option>
                                                        <option value="November">November</option>
                                                        <option value="Desember">Desember</option>
                                                        </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                        <label class="col-lg-2 col-sm-2 control-label">Tahun</label>
                                            <div class="col-lg-10">
                                                <input type="number" class="form-control" name="thn" id="thn" placeholder="Tuliskan tahun" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                        <label class="col-lg-2 col-sm-2 control-label">Nominal</label>
                                            <div class="col-lg-10">
                                                <input type="number" class="form-control" name="nominal" id="nominal" placeholder="Tuliskan nominal" required>
                                            </div>
                                        </div>
                                        <label for="nota">Unggah Nota</label>
                                                <div class="custom-file">
                                                    <input id="nota" name="nota" type="file" class="custom-file-input <?php return form_error("nota") ? "is-invalid" : "" ?>" id="exampleInputFile" required></input>
                                                    <label class="custom-file-label" for="exampleInputFile"></label>
                                                    <div class="invalid-feedback">
                                                        <?php return form_error("nota") ?>
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
            <!-- END Modal Edit -->

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
            <!-- /#page-wrapper -->

        </div>
    </div>
        <!-- /#wrapper -->

<script src=<?php return base_url("assets/js/dataTables/jquery.dataTables.min.js")?> /></script>
<script src=<?php return base_url("assets/js/dataTables/dataTables.bootstrap.min.js")?> /></script>

<script>
    $(document).ready(function() {
        // Untuk sunting
        $("#edit-data").on("show.bs.modal", function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

            // Isi nilai pada field
            modal.find("#id").attr("value",div.data("id"));
            modal.find("#ket").attr("value",div.data("ket"));
            modal.find("#tgl").attr("value",div.data("tgl"));
            modal.find("#bln").attr("value",div.data("bln"));
            modal.find("#thn").attr("value",div.data("thn"));
            modal.find("#nominal").attr("value",div.data("nominal"));
            modal.find("#nota").attr("value",div.data("nota"));
        });
    });
</script>

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

<script>
            function deleteConfirm(url) {
                $("#btn-delete").attr("href", url);
                $("#deleteModal").modal();
            }
        </script>

