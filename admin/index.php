<?php require_once 'inc/css.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/lost-and-found/server/core/init.php';
?>

<body class="big">
  <div class="main-content">
    <div class="container pt-lg-9">
      <div class="row justify-content-center">
        <div class="col-lg-4 col-md-7">
          <div class="card bg-secondary border-0 mb-0">

            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <h3>Staff Login Panel</h3>
              </div>
              <?php
              if (isset($_POST['login'])) {

                $email = $_POST['email'];
                $password = $_POST['password'];
                if (empty($email) || empty($password)) {
                  $message = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
											<strong> Empty fields found </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">×</span>
											</button>
										</div>';
                } else {
                  $adminClass = new admin();
                  $result     = $adminClass->signin($email, $password);
                }
              }
              echo @$message; ?>
              <form role="form" method="POST">
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Valid email address" type="email" name="email">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Password" type="password" name="password">
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" name="login" class="btn btn-primary btn-lg">Sign in</button>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <?php require_once 'inc/js.php' ?>