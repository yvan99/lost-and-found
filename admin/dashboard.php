<?php require_once 'inc/css.php';
require_once 'inc/server.php';
?>

<body>

    <?php require_once 'inc/sidebar.php' ?>
    <!-- Main content -->
    <div class="main-content" id="panel">
        <div class="big">
            <?php require_once 'inc/topnav.php' ?>
            <!-- Header -->
            <div class="header pb-6">
                <div class="container-fluid">
                    <div class="header-body">
                        <h1 class='text-white pb-50'>Welcome onboard ,<?php echo $names ?></h1>
                        <!-- Card stats -->
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card card-stats">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0">Total Clients</h5>
                                                <span class="h2 font-weight-bold mb-0"><?php echo $countClients; ?></span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                                    <i class="ni ni-active-40"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <p class="mt-3 mb-0 text-sm">
                                            <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                            <span class="text-nowrap">Since last month</span>
                                        </p> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card card-stats">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0">Total branches</h5>
                                                <span class="h2 font-weight-bold mb-0"><?php echo $countBranches ?></span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                                    <i class="ni ni-chart-pie-35"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <p class="mt-3 mb-0 text-sm">
                                            <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                            <span class="text-nowrap">Since last month</span>
                                        </p> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card card-stats">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0">Lost DOCS</h5>
                                                <span class="h2 font-weight-bold mb-0"><?php echo $countLost; ?></span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                                    <i class="ni ni-money-coins"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <p class="mt-3 mb-0 text-sm">
                                            <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                            <span class="text-nowrap">Since last month</span>
                                        </p> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card card-stats">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0">Found Docs</h5>
                                                <span class="h2 font-weight-bold mb-0"><?php echo $countFound ?></span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                                    <i class="ni ni-chart-bar-32"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <p class="mt-3 mb-0 text-sm">
                                            <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                            <span class="text-nowrap">Since last month</span>
                                        </p> -->
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card card-stats">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0">Total agents</h5>
                                                <span class="h2 font-weight-bold mb-0"><?php echo $countAgents; ?></span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                                    <i class="ni ni-chart-bar-32"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <p class="mt-3 mb-0 text-sm">
                                            <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                            <span class="text-nowrap">Since last month</span>
                                        </p> -->
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card card-stats">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0">Total claims</h5>
                                                <span class="h2 font-weight-bold mb-0"><?php echo $countClaims; ?></span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                                    <i class="ni ni-chart-bar-32"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <p class="mt-3 mb-0 text-sm">
                                            <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                            <span class="text-nowrap">Since last month</span>
                                        </p> -->
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card card-stats">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0">Delivered Docs</h5>
                                                <span class="h2 font-weight-bold mb-0">N/A</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                                    <i class="ni ni-chart-bar-32"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <p class="mt-3 mb-0 text-sm">
                                            <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                            <span class="text-nowrap">Since last month</span>
                                        </p> -->
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card card-stats">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0">Pending Deliver</h5>
                                                <span class="h2 font-weight-bold mb-0">N/A</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                                    <i class="ni ni-chart-bar-32"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <p class="mt-3 mb-0 text-sm">
                                            <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                            <span class="text-nowrap">Since last month</span>
                                        </p> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Argon Scripts -->
    <?php require_once 'inc/js.php' ?>