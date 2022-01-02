<?php require 'inc/css.php';
require 'inc/server.php';

?>

<body id="bg">
    <!-- <div id="loading-area"></div> -->
    <div class="page-wraper">
        <?php require 'inc/header.php' ?>

        <div class="section-full content-inner-2 bg-white browse-job">
            <div class="container">
                <ul class="nav nav-tabs nav-tabs-1" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link site-button active" id="tabPersonal" data-toggle="tab" href="#personal" role="tab" aria-controls="personal" aria-selected="true">Report lost document</a>
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
                                      }
                                      else{
                                         echo reportLost($repoName,$repoId,$repoType,$repoAddress,$repoDate,$user);
                                        }
                                      }
                                    ?>
                                    <form class="job-alert-bx" method="POST">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Document Owner Name</label>
                                                    <input class="form-control" type="text" name="docName">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Document ID</label>
                                                    <input class="form-control" type="text" name="docId">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Document type</label>

                                                    <select name="docType">
                                                        <option selected disabled>Select document type</option>
                                                        <?php $sel = select('*', 'document_type', '1');
                                                        foreach ($sel as $cate) :
                                                        ?>
                                                            <option value="<?php echo  $cate['doctype_id'] ?>"><?php echo  $cate['doctype_name'] ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Where did you lost your document ?</label>
                                                    <input class="form-control" type="text" name="docAddress">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>When did you lost document</label>
                                                    <input class="form-control" placeholder="DAY/MONTH/YEAR" type="text" name="docDate">
                                                </div>
                                            </div>
                                       
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox"  class="custom-control-input" id="job-alert-check" name="docAgree">
                                                        <label class="custom-control-label" for="job-alert-check">I agree to the Terms and Conditions and Privacy Policy</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 text-center">
                                                <a href="./" class="btn btn-dark">Return home</a>
                                                <button class="site-button"  type="submit" name="reportLost">Report Now</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-4 bg-gray">
                                    <div class="p-a25">
                                        <h6>Why should you create a job alert</h6>
                                        <ul class="list-check primary">
                                            <li>Get relevant jobs directly in your inbox</li>
                                            <li>Stay updated with latest opportunities</li>
                                            <li>Be the first one to apply</li>
                                            <li>Create up to 5 personalized job alerts</li>
                                        </ul>
                                        <div class="dez-divider bg-gray-dark"></div>
                                        <h6 class="font-14">Why <a href="../cdn-cgi/l/email-protection.html" class="__cf_email__" data-cfemail="aec7c0c8c1eecbd6cfc3dec2cb80cdc1c3">[email&#160;protected]</a></h6>
                                        <p class="m-b10"><strong class="text-black m-r10">800,000+ </strong> Jobs</p>
                                        <p class="m-b10"><strong class="text-black m-r10">100,000+</strong> CV searches daily</p>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry has been the industry.</p>
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
    <button class="scroltop fa fa-arrow-up" ></button>
</div>
        <?php require 'inc/js.php';
