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
                        <h1 class='text-white pb-50'>Document Logistics Portal</h1>
                        <!-- Card stats -->
                        <div class="row">

                            <div class="col-xl-4 col-md-6">
                                <div class="card card-stats">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0">Total Logistics</h5>
                                                <span class="h2 font-weight-bold mb-0"><?php echo $countDelivery ?></span>
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
                                                <h5 class="card-title text-uppercase text-muted mb-0">Pending delivery</h5>
                                                <span class="h2 font-weight-bold mb-0"><?php echo $pendingDelivery ?></span>
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
                                                <h5 class="card-title text-uppercase text-muted mb-0">Complete delivery</h5>
                                                <span class="h2 font-weight-bold mb-0"><?php echo $successDelivery?></span>
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
                            <h3 class="mb-0">Documents Delivery Report</h3>

                        </div>
                        <!-- Light table -->
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Document claimed</th>
                                        <th>Document Owner</th>
                                        <th>Delivery address</th>
                                        <th>Owner telephone</th>
                                        <th>Assigned Agent</th>
                                        <th>Assigned On</th>
                                        <th>Status</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $report = select('*', 'document_found,client,branch,claim,agent,document_delivery', "document_found.doc_id=claim.doc_id AND claim.cli_id=client.cli_id  AND claim.claim_branch=branch.bra_id AND document_delivery.claim_id=claim.claim_id AND document_delivery.agent_id=agent.agent_id  ");
                                    $counter = 1;
                                    foreach ($report as $myClaims) {

                                    ?>
                                        <tr>
                                            <td class="order-id text-primary"> <?php echo $counter; ?> </td>
                                            <td class="amount text-primary"><?php echo $myClaims['doc_serialcode'] ?></td>
                                            <td class="date"><?php echo $myClaims['claim_names']?></td>
                                            <td class="transfer"><?php echo $myClaims['claim_address'] ?></td>
                                            <td class="transfer"><?php echo $myClaims['claim_tel'] ?></td>
                                            <td class="transfer"><?php echo $myClaims['agent_fullnames'] ?></td>
                                            <td class="transfer"><?php echo $myClaims['docd_date'] ?></td>
                                            <?php
                                            if ($myClaims['docd_status'] == '0') {
                                            ?>
                                                <td class="text-warning">PENDING...</td>
                                            <?php } elseif ($myClaims['docd_status'] == '1') {
                                            ?>
                                                <td class="text-warning">DELIVERED</td>
                                            <?php } else { ?>
                                                <td class="text-success">Document Delivered</td>
                                            <?php } ?>
                                            
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