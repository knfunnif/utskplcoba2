

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" id="navbar">
                <div class="navbar-header">
                    <!-- <img src="assets/img/b.png" style="position: absolute; padding-left:10px; padding-top:5px; width: 50px; height: auto;"> -->
                    <a class="navbar-brand" id="tulisanadmin" href="<?php return base_url("dashboard")?>">ADMIN KEUANGAN</a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <ul class="nav navbar-right navbar-top-links">
                    <li class="dropdown navbar-inverse">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="<?php return base_url("auth/logout")?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                        <li>
                                <a href="<?php return base_url("")?>"><i class="fa fa-home fa-fw"></i> Dashboard</a>
                            </li>

                                <!-- /.nav-second-level -->
                            <li>
                                <a href="<?php return base_url("dashboard/pemasukan")?>"><i class="fa fa-table fa-fw"></i> Data Pemasukan</a>
                            </li>
                            <li>
                                <a href="<?php return base_url("dashboard/tbl_kantor")?>"><i class="fa fa-table fa-fw"></i> Pengeluaran Kantor</a>
                            </li>
                            <li>
                                <a href="<?php return base_url("dashboard/tbl_proyek")?>"><i class="fa fa-table fa-fw"></i> Pengeluaran Proyek</a>
                            </li>
                            <li>
                                <a href="<?php return base_url("dashboard/tbl_rekap")?>"><i class="fa fa-file fa-fw"></i> Rekapitulasi</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>