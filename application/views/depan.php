<?php include 'template/head.php' ?>
<title>Keuangan Matra Mandiri</title>

<script src=<?php return base_url("assets/js/morris-data.js") ?> />
</script>
<script src=<?php return base_url("assets/js/morris.min.js") ?> />
</script>

</head>


<body>
    <?php include 'template/side.php' ?>

    <!--------------------------------------------------------------------------------------------------------------->

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row" id="welcome">
                <div class="col-lg-12">
                    <h1 class="header" id="welkam">Welcome</h1>
                    <h3 class="header" id="welkam1">to</h3>
                    <h3 class="page-header" id="welkam2">Financial Management System!</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div id="pict">

            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-4 col-md-8" id="menuu">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-money fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge" id="paneldpn"> Pemasukan</div>
                                    <?php foreach ($total as $t) {
                                        $total = $t->sum;
                                        print_r ($total1 = "Rp " .  number_format($total, 0, ',', '.'));
                                    } ?>
                                
                                </div>
                            </div>
                        </div>
                        <a href="dashboard/pemasukan">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-institution fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge" id="paneldpn">Proyek</div>
                                    <?php foreach ($tproy as $t) {
                                        print_r ($total = $t->count);
                                    } ?>
                                </div>
                            </div>
                        </div>
                        <a href="dashboard/tbl_proyek">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-credit-card-alt fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge" id="paneldpn">Profit</div>
                                

                                </div>
                            </div>
                        </div> -->
                        <!-- <a href="dashboard/tbl_proyek">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                <div class="clearfix"></div>
                            </div>
                        </a> -->
                    </div>
                </div>
            </div>



            <!-- /.panel-body -->
        </div>
        <!-- /.panel-footer -->
    </div>
    <!-- /.panel .chat-panel -->
    </div>
    <!-- /.col-lg-4 -->
    </div>
    <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

</body>

</html>