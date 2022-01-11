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
                        <h1 class='text-white pb-50'>Document claims Portal</h1>
                        <!-- Card stats -->
                        <div class="row">

                            <div class="col-xl-4 col-md-6">
                                <div class="card card-stats">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0">Total claims</h5>
                                                <span class="h2 font-weight-bold mb-0"><?php echo $countFound ?></span>
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

                            
                            <div class="col-xl-4 col-md-6">
                                <div class="card card-stats">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0">Paid claims</h5>
                                                <span class="h2 font-weight-bold mb-0">N/A</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
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

                            
                            <div class="col-xl-4 col-md-6">
                                <div class="card card-stats">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0">Unpaid claims</h5>
                                                <span class="h2 font-weight-bold mb-0">N/A</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
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
                            <h3 class="mb-0">Documents claims List</h3>

                        </div>
                        <!-- Light table -->
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                            <thead>
                        <tr>
                            <th>No</th>
                            <th>Document claimed</th>
                            <th>Claim fee</th>
                            <th>Delivery address</th>
                            <th>Nearest branch</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                                <tbody>
                        <?php
                        $report = select('*', 'document_found,client,branch,claim', "document_found.doc_id=claim.doc_id AND claim.cli_id=client.cli_id  AND claim.claim_branch=branch.bra_id ");
                        $counter = 1;
                        foreach ($report as $myClaims) {

                        ?>
                            <tr>
                                <td class="order-id text-primary"> <?php echo $counter; ?> </td>
                                <td class="amount text-primary"><?php echo $myClaims['doc_serialcode'] ?></td>
                                <td class="date"><?php echo $myClaims['claim_fees'] . ' rwf ' ?></td>
                                <td class="transfer"><?php echo $myClaims['claim_address'] ?></td>
                                <td class="transfer"><?php echo $myClaims['bra_name'] ?></td>
                                <?php
                                if ($myClaims['claim_status'] == 'PENDING') {
                                ?>
                                    <td class="text-warning">PENDING...</td>
                                <?php } elseif ($myClaims['claim_status'] == 'SUCCESS') {
                                ?>
                                    <td class="text-warning">SUCCESS</td>
                                <?php } else { ?>
                                    <td class="text-success">Document Delivered</td>
                                <?php } ?>
                                <td><a href="claiminfo?claim=<?php echo actor($myClaims['claim_id'])?>" class="btn btn-success btn-sm">More info</a> </td>
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