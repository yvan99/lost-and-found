<?php require 'inc/css.php';
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/lost-and-found/server/core/init.php';

?>

<body id="bg">
    <div id="loading-area"></div>
    <div class="page-wraper">
        <?php require 'inc/header.php' ?>
        <div class="col-xl-12 col-lg-8 m-b30">
            <div class="job-bx table-job-bx clearfix">
                <div class="job-bx-title clearfix">
                    <h5 class="font-weight-700 pull-left text-uppercase">Lost Documents History</h5>
                    <a href="company-post-jobs.html" class="site-button right-arrow button-sm float-right">Back</a>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Document owner names</th>
                            <th>Document type</th>
                            <th>Document type</th>
                            <th>Lost date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $user = $_SESSION['clientIdLost'];
                        $report = select('*', 'document_lost,document_type', "document_lost.doc_founder='$user' and document_lost.doctype_id=document_type.doctype_id");
                        $counter = 1;
                        foreach ($report as $myReport) {

                        ?>
                            <tr>
                                <td class="order-id text-primary"># <?php echo $counter; ?> </td>
                                <td class="job-name"><a><?php echo $myReport['doc_fullnames'] ?></a></td>
                                <td class="amount text-primary"><?php echo $myReport['doc_serialcode'] ?></td>
                                <td class="date"><?php echo $myReport['doctype_name'] ?></td>
                                <td class="transfer"><?php echo $myReport['doc_createdDate'] ?></td>
                                <td class="expired pending"><?php echo $myReport['doc_status'] ?> </td>
                            </tr>
                        <?php $counter ++; } ?>
                    </tbody>
                </table>

            </div>
        </div>


        <div class="col-xl-12 col-lg-8 m-b30">
            <div class="job-bx table-job-bx clearfix">
                <div class="job-bx-title clearfix">
                    <h5 class="font-weight-700 pull-left text-uppercase">Found Documents History</h5>
                    <a href="company-post-jobs.html" class="site-button right-arrow button-sm float-right">Back</a>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Document owner names</th>
                            <th>Document type</th>
                            <th>Document type</th>
                            <th>Lost date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $foundReport = select('*', 'document_found,document_type', "document_found.doc_founder='$user' and document_found.doctype_id=document_type.doctype_id");
                        $counter = 1;
                        foreach ($foundReport as $myFoundReport) {

                        ?>
                            <tr>
                                <td class="order-id text-primary"># <?php echo $counter; ?> </td>
                                <td class="job-name"><a><?php echo $myFoundReport['doc_fullnames'] ?></a></td>
                                <td class="amount text-primary"><?php echo $myFoundReport['doc_serialcode'] ?></td>
                                <td class="date"><?php echo $myFoundReport['doctype_name'] ?></td>
                                <td class="transfer"><?php echo $myFoundReport['doc_createdDate'] ?></td>
                                <td class="expired pending"><?php echo $myFoundReport['doc_status'] ?> </td>
                            </tr>
                        <?php $counter ++; } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- Content END-->
    <?php require 'inc/footer.php' ?>
    <!-- scroll top button -->
    <button class="scroltop fa fa-arrow-up"></button>
    </div>
    <?php require 'inc/js.php' ?>