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
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Form Pemasukan Proyek
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <form role="form" action="<?php return base_url()."dashboard/input_pemasukan"; ?>" method="post">
                                                <div class="form-group">
                                                    <?php foreach ($pemasukan as $pm) { ?>
                                                    <div class="form-group">
                                                    <label>Proyek</label>
                                                    <input type="text" name="proyek" class="form-control" value="<?php print_r ($pm->nama)?>" required>
                                                </div>
                                                    <?php }?>
                                                </div>
                                                <div class="form-group">
                                                    <?php foreach ($pemasukan as $pm1) { ?>
                                                    <!-- ID PROYEK -->
                                                    <input type="hidden" name="idd" class="form-control" value="<?php print_r ($pm1->id_proyek)?>">
                                                    <?php }?>
                                                </div>
                                                <div class="row">
                                                <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Tanggal</label>
                                                    <select name="tanggal" class="form-control" id="tanggal" required>
                                                    <option value="">--pilih Tanggal--</option>
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
                                                <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Bulan</label>
                                                    <select name="bulan" class="form-control" id="tanggal" required>
                                                    <option value="">--pilih Bulan--</option>
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
                                                <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Tahun</label>
                                                    <input type="number" name="tahun" class="form-control" required>
                                                </div>
                                                </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Keterangan</label>
                                                    <input type="text" name="keterangan" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Nominal</label>
                                                    <input type="number" name="nominal" class="form-control" required>
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