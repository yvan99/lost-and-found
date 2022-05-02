<?php 
require 'inc/server.php';
require 'inc/userCheck.php';
require 'inc/css.php';
?>

<?php
$selectionProfileInfo=select("*","client","cli_id ='$userId'");
foreach($selectionProfileInfo as $profileInfo){
    $email=$profileInfo['cli_email'];
    $fname=$profileInfo['cli_fname'];
    $lname=$profileInfo['cli_lname'];
    $phone=$profileInfo['cli_phone'];
}

if(isset($_POST['update'])){
  $FirstName= $_POST['FirstName'];
  $LastName= $_POST['LastName'];
  $Email= $_POST['Email'];
  $Telphone= $_POST['Telphone'];
  update('client', 'cli_fname=:cli_fname,cli_lname=:cli_lname,cli_email=:cli_email,cli_phone=:cli_phone', "cli_id='$userId'", ['cli_fname'=>$FirstName,'cli_lname'=>$LastName,'cli_email'=>$Email,'cli_phone'=>$Telphone,]);
}

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
                            role="tab" aria-controls="personal" aria-selected="true">Edit Profile
                        </a>
                    </li>
                </ul>
                <?php
                if(isset($FirstName))

                echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong> Profile updated successfully  </strong> <button type="button"
                        class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>'
                ?>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="personal" role="tabpanel" aria-labelledby="tabPersonal">
                        <div class="job-bx">
                            <div class="row">
                                <div class="col-lg-8">

                                    <form class="job-alert-bx" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>First Name</label>
                                                    <input class="form-control" type="text" name="FirstName"
                                                        placeholder="Enter document owner's names"
                                                        value="<?php if (isset($FirstName))echo$FirstName; else echo$fname;?>">



                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Last Name</label>
                                                    <input class="form-control" type="text" name="LastName"
                                                        placeholder="Enter document owner's names"
                                                        value="<?php if (isset($LastName))echo$LastName; else echo$lname;?>">

                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input class="form-control" type="text" name="Email"
                                                        placeholder="Enter document number/Id"
                                                        value="<?php if (isset($Email))echo$Email; else echo$email;?>">
                                                </div>
                                            </div>


                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>telphone</label>
                                                    <input class="form-control" type="text" name="Telphone"
                                                        placeholder="Enter the address"
                                                        value="<?php  if (isset($Telphone))echo$Telphone; else echo$phone;?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">




                                            <div class="col-lg-12 text-center">
                                                <button class="btn btn-dark" name="update">update profile</button>


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