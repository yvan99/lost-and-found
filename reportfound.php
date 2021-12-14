<?php require 'inc/css.php';
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/lost-and-found/server/core/init.php';
?>

<body id="bg">
    <div id="loading-area"></div>
    <div class="page-wraper">
        <?php require 'inc/header.php' ?>

        <div class="section-full content-inner-2 bg-white browse-job">
            <div class="container">
                <ul class="nav nav-tabs nav-tabs-1" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link site-button active" id="tabPersonal" data-toggle="tab" href="#personal" role="tab" aria-controls="personal" aria-selected="true">Report found document</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="personal" role="tabpanel" aria-labelledby="tabPersonal">
                        <div class="job-bx">
                            <div class="row">
                                <div class="col-lg-8">
                                    <?php
                                    if (isset($_POST['reportFound'])) {
                                        $folder  = 'access/files/';
                                        @$repoName = escape($_POST['docName']);
                                        @$repoId   = escape($_POST['docId']);
                                        @$repoType = escape($_POST['docType']);
                                        @$repoLocation = escape($_POST['docLoc']);
                                        @$file    = $_FILES["docPhoto"]["name"];
                                        @$tmp     = $_FILES['docPhoto']['tmp_name'];
                                        if (empty($repoName) || empty($file)|| empty($repoId) || empty($repoType) || empty($repoLocation) || empty($file)) {
                                            echo $message = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                          <strong> Empty fields found ,check your form </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                              <span aria-hidden="true">×</span>
                                          </button>
                                      </div>';
                                        } else {
                                            echo reportFound($tmp,$file,$folder,$repoName, $repoId, $repoType, $repoLocation, $user);
                                        }
                                    }
                                    ?>
                                    <form class="job-alert-bx" method='POST' enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Document ownerNames</label>
                                                    <input class="form-control" type="text" name="docName">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Document serialCode</label>
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
                                                    <label>What is near by location?</label>
                                                    <select name="docLoc">
                                                        <option selected disabled>Select location</option>
                                                        <?php $sel = select('*', 'branch', '1');
                                                        foreach ($sel as $cate) :
                                                        ?>
                                                            <option value="<?php echo  $cate['bra_id'] ?>"><?php echo  $cate['bra_name'] ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Upload scanned document</label>
                                                    <input type="file" name="docPhoto" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="job-alert-check" name="docAgree">
                                                        <label class="custom-control-label" for="job-alert-check">I agree to the Terms and Conditions and Privacy Policy</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 text-center">
                                                <button class="site-button" type="submit" name="reportFound">Report Now</button>
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
        <button class="scroltop fa fa-arrow-up"></button>
    </div>
    <?php require 'inc/js.php';
