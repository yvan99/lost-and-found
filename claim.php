<?php
require 'inc/server.php';
require 'inc/userCheck.php';
require 'inc/css.php';

// GET THE DOCUMENT ID HASHED

$docId = unhash($_GET['doc']);

// FETCH RELATED DOCUMENT DATA
$selectDoc = select('*', 'document_found,branch,document_type', "document_found.doctype_id=document_type.doctype_id AND document_found.bra_id=branch.bra_id AND document_found.doc_id='$docId'");
# VERIFY IF THE USER IS LOGGED IN AND THE DOCUMENT EXISTS IN DB
if (!isset($_SESSION['clientIdLost']) || !$docId || !$selectDoc) {
    header('location:logout');
} else {
    foreach ($selectDoc as $document) :
        $docName   = $document['doc_fullnames'];
        $docSerial = $document['doc_serialcode'];
        $docType   = $document['doctype_name'];
        $docBranch = $document['bra_name'];
        $docPhoto  = $document['doc_photo'];
        $docDate   = $document['doc_createdDate'];
    endforeach;
}

$fees=100;
if (isset($_POST['submitClaim'])){

$comment=$_POST['comment'];
$names=$_POST['names'];
$address=$_POST['address'];
$branch=$_POST['branch'];
$tel=$_POST['tel'];
$momo=$_POST['momo'];
$claimResults=claim($userId,$docId,$fees,$comment,$names,$address,$branch,$tel,$momo);

}
?>

<body id="bg">
    <!--  <div id="loading-area"></div> -->
    <div class="page-wraper">
        <?php require 'inc/header.php' ?>
        <!-- Content -->
        <div class="page-content bg-white">
            <!-- contact area -->
            <div class="content-block">
                <!-- Browse Jobs -->
                <div class="section-full bg-white p-t50 p-b20">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-5 col-lg-4 m-b30">
                                <div class="sticky-top">
                                    <div class="candidate-info company-info">
                                        <div class="candidate-detail text-center">
                                            <div class="canditate-de">
                                                <a href="javascript:void(0);">
                                                    <img class="lostPhoto" src="access/files/<?php echo $docPhoto ?>">
                                                </a>

                                            </div>
                                            <div class="candidate-title">
                                                <h4 class="m-b5"><a
                                                        href="javascript:void(0);"><?php echo $docName ?></a></h4>
                                            </div>
                                        </div>
                                        <ul>
                                            <li><a href="" class="active">
                                                    <i class="fa fa-user-o" aria-hidden="true"></i>
                                                    <span>Document ID : <?php echo $docSerial ?></span></a></li>
                                            <li><a href="">
                                                    <i class="fa fa-file-text-o" aria-hidden="true"></i>
                                                    <span>Document type : <?php echo $docType ?></span></a></li>
                                            <li><a href="">
                                                    <i class="fa fa-random" aria-hidden="true"></i>
                                                    <span>Date found : <?php echo $docDate ?> </span></a></li>
                                            <li><a href="">
                                                    <i class="fa fa-briefcase" aria-hidden="true"></i>
                                                    <span>Document nearest branch : <?php echo $docBranch ?></span></a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-8 m-b30">
                                <div class="job-bx submit-resume">
                                    <div class="job-bx-title clearfix">
                                        <h5 class="font-weight-700 pull-left text-uppercase">Claim your document</h5>
                                        <a href="./" class="site-button right-arrow button-sm float-right">Back</a>
                                    </div>
                                    <form method="POST" autocomplete="off">
                                        <div class="row m-b30">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label>Enter your names</label>
                                                    <input required type="text" class="form-control" name="names">
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label>What is your address / Street number ?</label>
                                                    <input required type="text" class="form-control"
                                                        placeholder="Ex : Kigali , Nyamirambo KN 56ST" name="address">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label>What is your nearest branch ?</label>
                                                    <select required name="branch">
                                                        <option selected disabled>Select location</option>
                                                        <?php $sel = select('*', 'branch', '1');
                                                        foreach ($sel as $cate) :
                                                        ?>
                                                        <option value="<?php echo  $cate['bra_id'] ?>">
                                                            <?php echo  $cate['bra_name'] ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label>Enter your telephone number</label>
                                                    <input required type="text" class="form-control" name="tel">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="job-bx-title clearfix">
                                            <h5 class="font-weight-700 pull-left text-uppercase">Payment information
                                            </h5>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-5 col-md-6">
                                                <div class="form-group">
                                                    <label>Service charge fee(RWF)</label><br>
                                                    <input type="text" name="fees" class="form-control" disabled
                                                        value="<?php echo $fees;?>">

                                                </div>
                                            </div>

                                            <div class="col-lg-7 col-md-6">
                                                <div class="form-group">
                                                    <label>Payment method <img
                                                            src="assets/homepage/images/icons/momo.jpg"
                                                            style="width: 50px;" alt=""></label>
                                                    <input type="text" class="form-control" disabled
                                                        value="MTN MOBILE MONEY">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Enter your mobile money number</label>
                                                <input type="number" style="font-size: 30px;" class="form-control"
                                                    name="momo" required>
                                            </div>





                                            <div class="col-lg-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Do you have any comment ?</label>
                                                    <textarea required class="form-control" name="comment"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="job-alert-check" name="docAgree" required>
                                                        <label class="custom-control-label" for="job-alert-check">I
                                                            agree to the Terms and Conditions and Privacy Policy</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="submit" class="site-button m-b30" name="submitClaim"
                                            value="Confirm your claim">

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Browse Jobs END -->
            </div>
        </div>
        <!-- Content END-->
        <?php require 'inc/footer.php' ?>
        <!-- scroll top button -->
        <button class="scroltop fa fa-arrow-up"></button>
    </div>
    <?php require 'inc/js.php';