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
                        <h1 class='text-white pb-50'>Lost documents Portal</h1>
                        <!-- Card stats -->
                        <div class="row">

                            <div class="col-xl-3 col-md-6">
                                <div class="card card-stats">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0">Lost documents</h5>
                                                <span class="h2 font-weight-bold mb-0"><?php echo $countLost ?></span>
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
                            <h3 class="mb-0">Lost documents List</h3>

                        </div>
                        <!-- Light table -->
                        <div class="table-responsive p-3">
                            <table class="table align-items-center table-flush p-3" id="myTable">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Document owner names</th>
                                        <th>Document Number</th>
                                        <th>Document type</th>
                                        <th>Lost date</th>
                                      
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $report = select('*', 'document_lost,document_type', "document_lost.doctype_id=document_type.doctype_id");
                                    $counter = 1;
                                    foreach ($report as $myReport) {
                                    ?>
                                        <tr>
                                            <td class="order-id text-primary"> <?php echo $counter; ?> </td>
                                            <td class="job-name"><a><?php echo $myReport['doc_fullnames'] ?></a></td>
                                            <td class="amount text-primary"><?php echo $myReport['doc_serialcode'] ?></td>
                                            <td class="date"><?php echo $myReport['doctype_name'] ?></td>
                                            <td class="transfer"><?php echo $myReport['doc_createdDate'] ?></td>
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