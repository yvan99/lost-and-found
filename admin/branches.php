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
                        <h1 class='text-white pb-50'>Branch Management Portal</h1>
                        <!-- Card stats -->
                        <div class="row">

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
                            <h3 class="mb-0">Branch List</h3>
                            <button type="button" class="btn btn-success offset-9 mt--5" data-toggle="modal" data-target="#exampleModal">
                                New Branch
                            </button>

                        </div>
                        <!-- Light table -->
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" class="sort" data-sort="name">#</th>
                                        <th scope="col" class="sort" data-sort="budget">Branch Code</th>
                                        <th scope="col" class="sort" data-sort="status">Branch name</th>

                                    </tr>
                                </thead>

                                <tbody class="list">
                                    <?php
                                    $branchSelect = select('*', 'branch', '1');
                                    $counter = 1;
                                    foreach ($branchSelect as $branch) :
                                    ?>
                                        <tr>

                                            <td><?php echo $counter ?></td>
                                            <td><?php echo $branch['bra_code'] ?></td>
                                            <td><?php echo $branch['bra_name'] ?></td>

                                        </tr>
                                    <?php $counter++;
                                    endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                        <!-- Card footer -->

                    </div>
                </div>
            </div>

        </div>
        <!-- Button trigger modal -->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Register new branch</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Branch Code</label>
                                <input class="form-control" type="text" value="BRANCH CODE HERE" disabled id="example-text-input">
                            </div>

                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Branch Name</label>
                                <input class="form-control" type="text" name="braName" required id="example-text-input">
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" name="saveBranch" class="btn btn-success">Save Branch</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Argon Scripts -->
        <?php require_once 'inc/js.php' ?>