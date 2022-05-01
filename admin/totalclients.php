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
            <div class="header pb-1">
                <div class="container-fluid">
                    <div class="header-body">
                        <h1 class='text-white pb-50'>Total Clients</h1>
                        <!-- Card stats -->
                        <div class="row">

                            <div class="col-xl-4 col-md-6">
                                <div class="card card-stats">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0">list of clients</h5>
                                                <span class="h2 font-weight-bold mb-0"><?php echo $countClient ?></span>
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

                        </div>
                    </div>
                </div>
            </div>



        </div>
        <div class="container-fluid mt--4">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header border-0">
                            <h3 class="mb-0">Client List</h3>

                        </div>
                        <!-- Light table -->
                        <div class="table-responsive p-3">
                            <table class="table align-items-center table-flush p-3" id="myTable">
                                <thead class="thead-light">
                                <tr>
                            <th>No</th>
                            <th>Client Names</th>
                            <th>Client Email</th>
                            <th>Client Telephone</th>
                        </tr>
                                </thead>

                                <tbody>
                        <?php
                        $foundReport = select('*', 'client', '1');
                        $counter = 1;
                        foreach ($foundReport as $myFoundReport) {

                        ?>
                            <tr>
                                <td class="order-id text-primary"><?php echo $counter; ?> </td>
                                <td class="job-name"><a><?php echo $myFoundReport['cli_fname'] .' '. $myFoundReport['cli_lname'] ?></a></td>
                                <td class="amount text-primary"><?php echo $myFoundReport['cli_email'] ?></td>
                                <td class="date"><?php echo $myFoundReport['cli_phone'] ?></td>

                            </tr>
                        <?php $counter++;
                        } ?>
                    </tbody>
                            </table>
                        </div>
                        <!-- Card footer -->

                    </div>
                </div>
            </div>

        </div>
        <!-- Button trigger modal -->
        <!-- Argon Scripts -->
        <?php require_once 'inc/js.php' ?>