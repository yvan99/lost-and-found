<?php require_once 'inc/css.php';
require_once 'inc/server.php';
$claim = unhash($_GET['claim']);
$report = select('*', 'document_found,client,branch,claim', "document_found.doc_id=claim.doc_id AND claim.cli_id=client.cli_id  AND claim.claim_branch=branch.bra_id AND claim.claim_id='$claim'");
foreach ($report as $claimRow) {
    $nearBranch = $claimRow['bra_id'];
    $client     = $claimRow['cli_id'];
    $claimTel   = $claimRow['claim_tel'];
    $claimer    = $claimRow['claim_names'];
    $claimAddress = $claimRow['claim_address'];
}
?>

<body>

    <?php require_once 'inc/sidebar.php' ?>
    <!-- Main content -->
    <div class="main-content" id="panel">
        <div class="big">
            <?php require_once 'inc/topnav.php' ?>
            <!-- Header -->
            <div class="header pb-6 d-flex align-items-center pt--6" style="min-height: 200px; ">
                <!-- Mask -->

                <!-- Header container -->
                <div class="container-fluid d-flex align-items-center pb-1">
                    <div class="row">
                        <div class="col-lg-12 col-md-10">
                            <h1 class="display-2 text-white"><?php echo $claimRow['doc_serialcode'] ?></h1>
                            <p class="text-white mt-0 mb-5">Transaction ref : <?php echo $claimRow['claim_ref'] ?></p>
                            <?php if ($claimRow['claim_status'] == 'PAID') {
                            ?>
                                <a href="#!" class="btn btn-success">PAID</a>
                            <?php } else {
                                @$display = 'display:none'; ?>
                                <a href="#!" class="btn btn-danger">PENDING PAYMENT</a> <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col-xl-5 order-xl-1" style="<?php echo @$display; ?>">
                    <div class="card card-profile">
                        <img src="../access/files/<?php echo $claimRow['doc_photo'] ?>" alt="Image placeholder" class="card-img-top">
                    </div>
                </div>
                <div class="col-xl-7 order-xl-2" style="<?php echo @$display ?>">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">Claimed document information</h3>
                                </div>

                            </div>
                        </div>
                        <div class="card-body">

                            <h6 class="heading-small text-muted mb-4">Client information</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">Client Names</label>
                                            <input type="text" id="input-username" class="form-control" value="<?php echo $claimRow['cli_fname'] . ' ' . $claimRow['cli_lname'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-email">Email address</label>
                                            <input type="email" id="input-email" class="form-control" value="<?php echo $claimRow['cli_email']; ?>">
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <hr class="my-4" />
                            <!-- Address -->
                            <h6 class="heading-small mb-4">DOCUMENT DELIVERY INFORMATION</h6>
                            <?php
                            if (isset($_POST['deliverConfirm'])) {
                                @$agent = $_POST['deliverLogistic'];
                                if (!empty($agent)) {
                                    $callAgent = new agent();
                                    $callAgent->assignDelivery($agent, $claim, $claimAddress, $claimer, $claimTel);
                                } else {
                                    echo $message = '<div class="alert alert-danger alert-dismissible fade show col-12" role="alert">
                                    <strong>Empty fields found</strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                      </div>';
                                }
                            }
                            ?>
                            <form method="POST">
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-address">Nearest client branch</label>
                                                <input id="input-address" class="form-control" placeholder="Home Address" value="<?php echo $claimRow['bra_name'] ?>" type="text">
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-city">Available Logistic agents to assign</label>

                                                <select name="deliverLogistic" class='form-control'>
                                                    <option selected>Choose agent</option>
                                                    <?php $sel = select('*', 'agent', "bra_id='$nearBranch'");
                                                    foreach ($sel as $agent) :
                                                    ?>

                                                        <option value="<?php echo  $agent['agent_id'] ?>"><?php echo  $agent['agent_fullnames'] ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <button type="submit" name="deliverConfirm" class="btn btn-lg btn-primary">CONFIRM DELIVERY</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Button trigger modal -->
            <!-- Argon Scripts -->
            <?php require_once 'inc/js.php' ?>