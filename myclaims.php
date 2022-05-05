<?php
require 'inc/server.php';
require 'inc/userCheck.php';
require 'inc/css.php';
if (!$_SESSION['clientIdLost']) {
    header('location:logout');
}
?>
<style>
.footer {
  position: fixed;
  bottom: 0;
  width: 100%;
 
}
</style>
<body id="bg">
    <!-- <div id="loading-area"></div> -->
    <div class="page-wraper">
        <?php require 'inc/header.php' ?>
        <div class="col-xl-12 col-lg-8 m-b30">
            <div class="job-bx table-job-bx clearfix">
                <div class="job-bx-title clearfix">
                    <h5 class="font-weight-700 pull-left text-uppercase">My documents claim history</h5>
                    <a href="./" class="site-button right-arrow button-sm float-right">Back to homepage</a>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Document claimed</th>
                            <th>Claim fee</th>
                            <th>Delivery address</th>
                            <th>Nearest branch</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $report = select('*', 'document_found,client,branch,claim', "document_found.doc_id=claim.doc_id AND claim.cli_id=client.cli_id AND client.cli_id='$userId' AND claim.claim_branch=branch.bra_id ");
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
                            </tr>
                        <?php $counter++;
                        } ?>
                    </tbody>
                </table>

            </div>
        </div>

    </div>
    </div>
    </div>
    <!-- Content END-->
    <div  class="footer">
    <?php require 'inc/footer.php' 
    ?>
    </div>
    <!-- scroll top button -->
    <button class="scroltop fa fa-arrow-up"></button>
    </div>
    <?php require 'inc/js.php' ?>