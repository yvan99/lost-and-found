<?php
require 'inc/server.php';
require 'inc/userCheck.php';
require 'inc/css.php';
?>
<style>
.footer {
  position: fixed;
  bottom: 0;
  width: 100%;
 
}
</style>
<body id="bg">
    <div id="loading-area"></div>
    <div class="page-wraper">
        <?php require 'inc/header.php' ?>

        <!-- Create Account -->
        <div class="section-full content-inner-2 browse-job bg-white">

            <div class="container">
                <div class="row">
                    <?php
                    $countLostDoc = countAffectedRows("document_lost", "doc_founder= '$userId' and  doc_status=0");
                    if ($countLostDoc > 0) {
                        $SelectLostDoc = select("*", "document_lost", "doc_founder= '$userId' and  doc_status= 0");
                        foreach ($SelectLostDoc as $lostDoc) {
                            $fullNames = $lostDoc['doc_fullnames'];
                            $docId = $lostDoc['doc_serialcode'];
                            $docType = $lostDoc['doctype_id'];
                            $SelectDocType = select('*', "document_type", "doctype_id='$docType'");
                            foreach ($SelectDocType as $newDoc) $newdocName = $newDoc['doctype_name'];

                            $result = FoundNotification($fullNames, $docId, $docType);

                            if ($result) {
                    ?>
                                <div class="col-lg-9 ">
                                    <h6 class="m-0"> found smilar doc to your lost <?php echo $newdocName . ' NO ' . $docId ?></h6>
                                    <hr>
                                <?php }
                            if (isset($result['best'])) {
                                ?>


                                    <div class="box shadow-sm rounded bg-white mb-3">
                                        <div class="box-title border-bottom p-3">
                                            <h6 class="m-0">Best matches</h6>
                                        </div>
                                        <div class="box-body p-0">
                                            <?php
                                            foreach ($result['best'] as $r) {
                                                $myDocTypeId = $r['doctype_id'];
                                                $PostUser = $r['doc_founder'];
                                                $date = $r['doc_createdDate'];
                                                $selectPostedUser = select("cli_fname", "client", "cli_id='$PostUser'");
                                                foreach ($selectPostedUser as $postedUser) $postedUserName = $postedUser['cli_fname'];

                                            ?>

                                                <div class="p-3 d-flex align-items-center osahan-post-header">
                                                    <div class="dropdown-list-image mr-3">

                                                    </div>
                                                    <div class="font-weight-bold mr-3">
                                                        <div class="mb-2">

                                                            <?php
                                                            ?>
                                                            We found 99% best match to your lost <?php echo $newdocName; ?> posted by
                                                            <?php echo $postedUserName ?>



                                                        </div>
                                                        <a href="claim?doc=<?php echo actor($r['doc_id']) ?>" type="button" class="btn btn-outline-success btn-sm">Claim Document</a>
                                                    </div>
                                                    <span class="ml-auto mb-auto">

                                                        <br />
                                                        <div class="text-right text-muted pt-1"><?php echo calcPostedDay($date) ?></div>
                                                    </span>
                                                </div>
                                        <?php }
                                        } ?>
                                        </div>
                                    </div>
                                    <?php if (isset($result['worst'])) {
                                    ?>

                                        <div class="box shadow-sm rounded bg-white mb-3">
                                            <div class="box-title border-bottom p-3">
                                                <h6 class="m-0">worst matches</h6>
                                            </div>
                                            <div class="box-body p-0">

                                                <?php foreach ($result['worst'] as $r) {
                                                    $myDocTypeId = $r['doctype_id'];
                                                    $PostUser = $r['doc_founder'];
                                                    $date = $r['doc_createdDate'];
                                                    $selectPostedUser = select("cli_fname", "client", "cli_id='$PostUser'");
                                                    foreach ($selectPostedUser as $postedUser) $postedUserName = $postedUser['cli_fname']; ?>


                                                    <div class="p-3 d-flex align-items-center osahan-post-header">

                                                        <div class="font-weight-bold mr-3">
                                                            <div class="mb-2">We found posted doc that might be yours , posted by <?php
                                                                                                                                    echo $postedUserName ?></div>
                                                            <a href="claim?doc=<?php echo actor($r['doc_id']) ?>" class="btn btn-outline-success btn-sm">Claim Document</a>
                                                        </div>
                                                        <span class="ml-auto mb-auto">

                                                            <br />
                                                            <div class="text-right text-muted pt-1">
                                                                <?php echo calcPostedDay($date) ?></div>
                                                        </span>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    <?php } ?>

                                </div>
                        <?php }
                    } ?>
                </div>
            </div>


            <!-- Create Account END -->
<div class="footer">
            <?php require 'inc/footer.php' ?></div>
        </div>


        <?php require 'inc/js.php'; ?>
            