<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/lost-and-found/server/core/init.php';
class admin{
#ADMIN SIGNIN 
function signin($email, $password)
{

    $email    = escape($email);
    $password = escape($password);
    $count = countAffectedRows('admin', "adm_email='$email' LIMIT 1");
    if ($count) {
        //from here we are sure that email is available
        $rows = select('*', 'admin', "adm_email='$email'");
        $hash = null;
        foreach ($rows as $row)  $hash = $row['adm_password'];
        //selection of hashed password stored in db
        foreach ($rows as $row) $id = $row['adm_id'];
        $id;
        $log = verify_password($password, $hash);
        if ($log) {
            $log;
            session_start();
            create_session($id, 'adminIdLost');
            $message = '<div class="alert alert-success alert-dismissible fade show" role="alert">
       <strong> Logged In , Redirecting ...</strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">×</span>
       </button>
   </div>';
            echo $message;
            echo "<script>" . 'setTimeout(function(){ window.location = "dashboard";}, 2000);' . "</script>";
        }
    } else {
        $message = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong> Invalid credentials , try again </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
      </button>
  </div>';
        return $message;
    }
}
}