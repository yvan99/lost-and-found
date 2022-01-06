<?php
require_once 'inc/server.php';
## verify account
$getToken   = unhash($_GET['user']);
if (!$getToken) {
  # check some hacks...
  header('location:logout');
} ?>
<?php
if (isset($_POST['btn-submit'])) {
  $number_1 = escape($_POST['num_1']);
  $number_2 = escape($_POST['num_2']);
  $number_3 = escape($_POST['num_3']);
  $number_4 = escape($_POST['num_4']);
  $number_5 = escape($_POST['num_5']);
  $number_6 = escape($_POST['num_6']);
  $combiner = $number_1 . $number_2 . $number_3 . $number_4 . $number_5 . $number_6;
  if ($combiner != $getToken) {
    $message = '<div class="status-userNotCreated">
    <strong> Sorry ,your token is not matchinh the one we sent you , Try again </strong>
</div>';
  } else {
    update('client', 'cli_status=:status', "cli_token='$getToken'", ['status' => 1]);
    $message = '<div class="status-userCreated">
              <strong> Account activated successfully , Redirecting you back to the system </strong>
          </div>';
    echo "<script>" . 'setTimeout(function(){ window.location = "./";}, 2000);' . "</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="<?php echo getenv("APP_LANGUAGE"); ?>">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="assets/homepage/css/verify.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <title>Verify Account :: Lost and found</title>
</head>

<body>
  <form action="" method="post" id="register-form">
    <div class="container">
      <img src="assets/homepage/images/icons/verified.png" alt="">
      <h2>Verify Your Account</h2>
      <?php echo @$message;  ?>
      <p>We emailed you the six digit code to your email <br /> Enter the code below to confirm your email address.</p>
      <div class="code-container">

        <input type="number" class="code" name="num_1" placeholder="-" min="0" max="9" required>
        <input type="number" class="code" name="num_2" placeholder="-" min="0" max="9" required>
        <input type="number" class="code" name="num_3" placeholder="-" min="0" max="9" required>
        <input type="number" class="code" name="num_4" placeholder="-" min="0" max="9" required>
        <input type="number" class="code" name="num_5" placeholder="-" min="0" max="9" required>
        <input type="number" class="code" name="num_6" placeholder="-" min="0" max="9" required>
      </div>

      <button type="submit" class="myButton" name="btn-submit" id="btn-submit">
        <span class="glyphicon glyphicon-log-in"></span> &nbsp; Verify Account
      </button>

  </form>

  </div>
  <script src="assets/homepage/js/verify.js"></script>
</body>

</html>