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
                    <h1 class="page-header">Matra Mandiri</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">

                            Form Pengeluaran Kantor
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <!-- <form role="form" > -->
                                <form action="<?php return base_url() . "Dashboard/upload_kantor"; ?>" method="POST" enctype="multipart/form-data">
                                    <div class="col-lg-12">
                                        <!-- <div class="col-lg-12"> -->
                                        <!-- <div class="form-group">
                                                    <label for="id_kantor">ID</label>
                                                    <input type="text" id="id_kantor" name="id_kantor" class="form-control" required>
                                                </div> -->
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="tanggal">Hari</label>
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
                                                    <label for="bulan">Bulan</label>
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
                                                    <label for="tahun">Tahun</label>
                                                    <input type="number" id="tahun" name="tahun" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="keperluan">Keperluan</label>
                                            <input type="text" id="keperluan" name="keperluan" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="opsi">Status</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" id="opsi" name="opsi" id="optionsRadios1" value="Lunas" checked>Lunas
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="opsi" id="optionsRadios1" value="Belum Lunas" checked>Belum Lunas
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <label for="kota">Kota</label>
                                                <input type="text" id="kota" name="kota" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="nominal">Nominal</label>
                                            <input type="number" id="nominal" name="nominal" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="proyek">Proyek</label>
                                            <input type="text" id="proyek" name="proyek" class="form-control"> *isi bila ada
                                        </div>
                                        <!-- <div class="form-group"> -->
                                        <!-- <label>Input Nota</label> -->
                                        <!-- <input name="nota" type="file"> -->
                                        <label for="nota">Unggah Nota </label>
                                        <div class="custom-file">
                                            <input name="nota" type="file" class="custom-file-input <?php print_r (form_error("nota") ? "is-invalid" : "") ?>" id="exampleInputFile"></input>
                                            <label class="custom-file-label" for="exampleInputFile"></label>
                                            <div class="invalid-feedback">
                                                <?php print_r (form_error("nota")) ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" value="Tambah" class="btn btn-default">Submit</button>
                                        <button type="reset" class="btn btn-default">Reset</button>
                                    </div>
                            </div>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
    <script src="<?php return base_url() . "assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js" ?>"></script>


    <script>
        $(document).ready(function() {
            bsCustomFileInput.init();
        });
    </script>