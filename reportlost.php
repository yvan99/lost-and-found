<?php 
require 'inc/server.php';
require 'inc/userCheck.php';
require 'inc/css.php';
?>

<body id="bg">
    <!-- <div id="loading-area"></div> -->
    <div class="page-wraper">
        <?php require 'inc/header.php' ?>

        <div class="section-full content-inner-2 bg-white browse-job">
            <div class="container">
                <ul class="nav nav-tabs nav-tabs-1" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link site-button active" id="tabPersonal" data-toggle="tab" href="#personal"
                            role="tab" aria-controls="personal" aria-selected="true">Report lost document</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="personal" role="tabpanel" aria-labelledby="tabPersonal">
                        <div class="job-bx">
                            <div class="row">
                                <div class="col-lg-8">
                                    <?php 
                                    if (isset($_POST['reportLost'])) {
                                        @$repoName = escape($_POST['docName']);  
                                        @$repoId   = escape($_POST['docId']);  
                                        @$repoType = escape($_POST['docType']);  
                                        @$repoAddress = escape($_POST['docAddress']);  
                                        @$repoDate    = escape($_POST['docDate']);
                                        @$repoAgree = $_POST['docAgree'];
                                        if (empty($repoName) || empty($repoId)||empty($repoType||empty($repoAddress)||empty($repoDate) || empty($repoAgree))) {
                                          echo $message = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                          <strong> Empty fields found ,check your form </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                              <span aria-hidden="true">×</span>
                                          </button>
                                      </div>';
                                    echo $repoId;
                                      }
                                      else{
                                         echo reportLost($repoName,$repoId,$repoType,$repoAddress,$repoDate,$userId);
                                        }
                                      }
                                    ?>
                                    <form class="job-alert-bx" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Document type</label>

                                                    <select name="docType">
                                                        <option selected disabled>Select document type</option>
                                                        <?php $sel = select('*', 'document_type', '1');
                                                        foreach ($sel as $cate) :
                                                        ?>
                                                        <option value="<?php echo  $cate['doctype_id'] ?>">
                                                            <?php echo  $cate['doctype_name'] ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Document Owner Name</label>
                                                    <input class="form-control" type="text" name="docName"
                                                        placeholder="Enter document owner's names">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Document ID</label>
                                                    <input class="form-control" type="text" name="docId"
                                                        placeholder="Enter document number/Id">
                                                </div>
                                            </div>


                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Where did you lost your document ?</label>
                                                    <input class="form-control" type="text" name="docAddress"
                                                        placeholder="Enter the address">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>When did you lost document</label>
                                                    <input class="form-control" placeholder="DAY/MONTH/YEAR" type="text"
                                                        name="docDate">
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="job-alert-check" name="docAgree">
                                                        <label class="custom-control-label" for="job-alert-check">I
                                                            agree to Lost & found Terms and Conditions and Privacy
                                                            Policy</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 text-center">
                                                <a href="./" class="btn btn-dark">Return home</a>
                                                <button class="site-button" type="submit" name="reportLost">Report Now</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-4 bg-gray">
                                    <div class="p-a25">
                                        <h6>Report your lost document</h6>
                                        <ul class="list-check primary">
                                            <li>Make sure you have searched it before to see if it is not yet found</li>
                                            <li>Provide correct information</li>
                                            <li>Report a document of which you have a proof that it is yours</li>
                                            <li>You will be notified in case your documents are found</li>
                                        </ul>
                                        <div class="dez-divider bg-gray-dark"></div>

                                        <h6 class="font-14">Stay tuned</h6>
                                        <p class="m-b10">Lost and found here for our people</p>
                                        <p class="m-b10">If there is any problem call us on <b>0780859910<b></p>
                                        

                                   
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Create Account END -->
        <?php require 'inc/footer.php' ?>
        <!-- scroll top button -->
        <button class="scroltop fa fa-arrow-up"></button>
    </div>
    <?php require 'inc/js.php';