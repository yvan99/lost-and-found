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
                        <h1 class='text-white pb-50'>Logistics agents portal</h1>
                        <!-- Card stats -->
                        <div class="row">

                            <div class="col-xl-3 col-md-6">
                                <div class="card card-stats">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0">Total agents</h5>
                                                <span class="h2 font-weight-bold mb-0"><?php echo $countAgents ?></span>
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
                            <button type="button" class="btn btn-primary offset-9 mt--5" data-toggle="modal" data-target="#exampleModal">
                                New Agent
                            </button>

                        </div>
                        <?php
                        if (isset($_POST['saveLogistics'])) {
                            $code      = escape($_POST['agcode']);
                            $names     = escape($_POST['agnames']);
                            $telephone = escape($_POST['agtelephone']);
                            $address   = escape($_POST['agaddress']);
                            $branch    = escape($_POST['agbranch']);

                            if (empty($names) || empty($telephone) || empty($address) || empty($branch) || empty($code)) {
                            } else {

                                $callAgentClass = new agent();
                                $callAgentClass->registerAgent($names, $telephone, $address, $branch, $code);
                            }
                        }

                        ?>
                        <!-- Light table -->
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" class="sort" data-sort="name">#</th>
                                        <th scope="col" class="sort" data-sort="budget">Account Code</th>
                                        <th scope="col" class="sort" data-sort="status">Full name</th>
                                        <th>Telephone</th>
                                        <th>Branch</th>
                                        <th>address</th>

                                    </tr>
                                </thead>

                                <tbody class="list">
                                    <?php
                                    $agentSelect = select('*', 'branch,agent', "branch.bra_id=agent.bra_id");
                                    $counter = 1;
                                    foreach ($agentSelect as $agent) :
                                    ?>
                                        <tr>

                                            <td><?php echo $counter ?></td>
                                            <td><?php echo $agent['agent_code'] ?></td>
                                            <td><?php echo $agent['agent_fullnames'] ?></td>
                                            <td><?php echo $agent['agent_phone'] ?></td>
                                            <td><?php echo $agent['bra_name'] ?></td>
                                            <td><?php echo $agent['agent_location'] ?></td>

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
                        <h5 class="modal-title" id="exampleModalLabel">Register new logistics agent</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST">
                            <div class="row">


                                <input class="form-control" type="text" name="agcode" hidden value="<?php echo 'AG' . verificationToken(); ?>">


                                <div class="form-group col-md-6">
                                    <label for="example-text-input" class="form-control-label">Enter full names</label>
                                    <input class="form-control" type="text" name="agnames" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="example-text-input" class="form-control-label">Enter valid telephone number</label>
                                    <input class="form-control" type="text" name="agtelephone" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="example-text-input" class="form-control-label">Enter address</label>
                                    <input class="form-control" type="text" name="agaddress" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="form-control-label" for="input-city">Select branch</label>

                                    <select name="agbranch" class='form-control'>
                                        <option selected>Choose branch</option>
                                        <?php $sel = select('*', 'branch', "1");
                                        foreach ($sel as $branch) :
                                        ?>
                                            <option value="<?php echo  $branch['bra_id'] ?>"><?php echo  $branch['bra_name'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>


                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" name="saveLogistics" class="btn btn-success">Save Logistic agent</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <!-- Argon Scripts -->
        <?php require_once 'inc/js.php' ?>