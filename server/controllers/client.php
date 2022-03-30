<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/lost-and-found/server/core/init.php';

class client
{
  public $fname;
  public $lname;
  public $phone;
  public $email;
  public $password;

  function __construct($fname = null, $lname = null, $phone = null, $email = null, $password = null)
  {
    $this->fname = escape($fname);
    $this->lname = escape($lname);
    $this->phone = escape($phone);
    $this->email = escape($email);
    $this->password = escape($password);
  }

  function signup()
  {
    $hashedpassword = create_hash($this->password);

    //this will hash password
    $affectedRow = countAffectedRows('client', "cli_email= '$this->email' and cli_status=1");

    //$affectedRow will verify if email is already registerd


    if ($affectedRow == 0) {
      $token = verificationToken();

      //this token sent to user

      $data = ['cli_fname' => $this->fname, 'cli_lname' => $this->lname, 'cli_email' => $this->email, 'cli_password' => $hashedpassword, 'cli_phone' => $this->phone, 'cli_status' => 0, 'token' => $token];

      //$data array will store data to be inserted
      $dataStructure = '`cli_fname`, `cli_lname`, `cli_email`, `cli_password`, `cli_phone`, `cli_token`, `cli_status`';
      //$dataStructure will hold datastructure of table
      $values = ':cli_fname, :cli_lname, :cli_email, :cli_password, :cli_phone,:token, :cli_status';

      insert('client', $dataStructure, $values, $data);
      $userBody = '`
        <table style="padding:0px;border:0px solid #DDD;margin:0 auto;font-family:calibri;font-weight:bold;">
        
        <tr><td style="padding:10px 30px;margin:0;text-align:left;">
        Hello ' . $this->fname . ' ' . $this->lname . ' Welcome to lost & found , we are pleased to announce to you that your account  have been successfully created ' . ' <h2 style="color:#dc3545">' . $token . ' </h2> ' . ' Is your account verification code' . '<br>'
        . 'You will use it to access your account :' . 'Do not share any information provided with anyone and if you have any issues with your account do not hesitate to contact us
        
        Kindly Regards,<br> lost&found support team <br><br></td></tr>
        </table>`';
      resetpasswordmail($this->email, $userBody, 'account verification');
      echo "<script>" . 'setTimeout(function(){ window.location = "verify?user=' . $this->email . '"}, 1000);' . "</script>";
    } else {
      $message = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong> Email is already taken</strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
      </button>
        </div>';
      echo $message;
    }
  }

  function signin($email, $password)
  {

    $email = escape($email);
    $password = escape($password);
    $count = countAffectedRows('client', "cli_email='$email' and cli_status='1' LIMIT 1");
    if ($count) {
      //from here we are sure that email is available
      $rows = select('*', 'client', "cli_email='$email'");
      $hash = null;
      foreach ($rows as $row)  $hash = $row['cli_password'];
      //selection of hashed password stored in db
      foreach ($rows as $row) $id = $row['cli_id'];
      $id;
      $log = verify_password($password, $hash);
      if ($log) {
        $log;
        create_session($id, 'clientIdLost');
        $message = '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong> Logged In , Redirecting ...</strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>';
        echo $message;
        echo "<script>" . 'setTimeout(function(){ window.location = "./";}, 2000);' . "</script>";
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

  function logout()
  {
    destroy_session();
    return true; //
  }

  function resetpassword($email)
  {
    $email = escape($email);
    $count = countAffectedRows('admin', "adm_email='$email' and adm_status = 1");

    if ($count != 1) {
      return false;
    } else {
      $token = verificationToken();
      $row = select('*', 'admin', "adm_email='$email' and adm_status = 1");
      #selection of admin id  belongs to email provided
      foreach ($row as $admin) {
        $admName = $admin['adm_fname'] . ' ' . $admin['adm_lname'];

        $adminId = $admin['adm_id'];
      }
      #this will expire all token belong to member befor sending other
      update('verification_token', 'vt_status=:vt_status', "vt_userId='$adminId' and vt_status=1", ['vt_status' => 0,]);
      #$data array will store data to be inserted
      $data = [
        'vt_token' => $token,
        'vt_indate' => date('Y-m-d  h:i:s'),
        'vt_user' => 'admin',
        'vt_userId' => $adminId,
        'vt_status' => '1',
      ];
      #$dataStructure will hold datastructure of table
      $dataStructure = 'vt_token, vt_indate, vt_user, vt_userId, vt_status';
      #$values
      $values = ':vt_token, :vt_indate, :vt_user, :vt_userId, :vt_status';
      echo '<script type="text/javascript">window.location =("emailsent")</script>';

      insert('verification_token', $dataStructure, $values, $data);

      $resetlink = "http://localhost/lost-and-found/resetlastStep?token=" . actor($token);


      $userSubject = "Reset your password";


      $userBody = '`
            <table style="padding:0px;border:0px solid #DDD;margin:0 auto;font-family:calibri;font-weight:bold;">
            <tr>
                    <td style="background-color:#fff;padding:10px 30px;margin:0;font-size:2.5em;color:#4A7BA5;text-align:center;">
                      <img src="https://jausolutions.com/justbetweenus/media/LOGO.png"style="width:250px;">
                    </td>
                  </tr>
            <tr><td style="padding:10px 30px;margin:0;text-align:left;">
            Hi ' . $admName . 'There was a request to change your password! If you did not make this request then please ignore this email.<br>

            
            Otherwise, please click this link to change your password: </h6> click <a href=' . "$resetlink" . '> here </a> to reset your account ' . $resetlink . '<br>
            
            Kindly Regards,<br> cdh support team <br><br></td></tr>
      
      
                        
                        
              
            </table>
            
            
            
            `';




      resetpasswordmail($email, $userBody, $userSubject);
      //resetpasswordmail() will send mail with token to reset password
      return true;
    }
  }
}

function AcceptResetedpassword($password, $token)

{
  $idSelection = select('*', 'verification_token,admin', "vt_token ='$token' and admin.adm_id = verification_token.vt_userId ");
  foreach ($idSelection as $ids) {
    $id = $ids['vt_userId'];
    // $affCode=$id['aff_code'];

  }
  $hashedpassword = create_hash(escape($password));
  update('admin', 'adm_password=:adm_password', "adm_id='$id'", ['adm_password' => $hashedpassword,]);
  #update token to verified
  update('verification_token', 'vt_status=:vt_status', "vt_token='$token'", ['vt_status' => 9,]);
  //   create_session($affCode,'affiliate');
  header("location:dashboard");
  return true;
}
function Acceptedpassword()
{
}
function reportLost($repoName, $repoId, $repoType, $repoAddress, $repoDate, $user)
{
            $countSimilar = countAffectedRows('document_found', "	doc_fullnames='$repoName' OR doc_serialcode='$repoId' LIMIT 1");
            $countDocId   = countAffectedRows('document_lost', "	doc_serialcode='$repoId' LIMIT 1");
            if ($countSimilar) {
              $getSimilar = select('*', 'client,document_found,document_lost', "document_found.doc_serialcode='$repoId' and document_lost.doc_founder=client.cli_id ");
              if ($getSimilar) {
                foreach ($getSimilar as $similar) :
                  $userPhone = $similar['cli_phone'];
                  $userFirst = $similar['cli_fname'];
                  $userLast  = $similar['cli_lname'];
                  $userIde   = $similar['cli_id'];
                endforeach;
                $message = "Hello " . $userFirst . ' ' . $userLast . " Someone have reported a document with the same information as what you have claimed to lost , Please visit our system to verify if it is yours";
                # IF USER FOUND ,SEND SMS NOTIFICATION 
                sendSms($userPhone, $message);
                echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
              <strong> We found similar lost document , Sending notification ... </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
            </div>';
            $data = ['id' => null, 'code' => $repoId, 'type' => $repoType, 'names' => $repoName, 'founder' => $user, 'status' => 0, 'date' => $repoDate, 'address' => $repoAddress];
            $datastracture = '`doc_id`, `doctype_id`, `doc_serialcode`, `doc_fullnames`, `doc_founder`, `doc_status`, `doc_createdDate`, `doc_address`';
            $values = ':id,:type,:code,:names,:founder,:status,:date,:address';
            insert('document_lost', $datastracture, $values, $data);
            return   '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Document reported successfully </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
          </button>
        </div>';
              }
            } elseif ($countDocId) {
              return   '<div class="alert alert-danger alert-dismissible fade show" role="alert">
>>>>>>> ce0c94af842f84bca1a185687f08ba67f9be823d
            <strong> Document is already reported </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
          </div>';
  } elseif (!$countSimilar && !$countDocId) {
    $data = ['id' => null, 'code' => $repoId, 'type' => $repoType, 'names' => $repoName, 'founder' => $user, 'status' => 0, 'date' => $repoDate, 'address' => $repoAddress];
    $datastracture = '`doc_id`, `doctype_id`, `doc_serialcode`, `doc_fullnames`, `doc_founder`, `doc_status`, `doc_createdDate`, `doc_address`';
    $values = ':id,:type,:code,:names,:founder,:status,:date,:address';
    insert('document_lost', $datastracture, $values, $data);
    return   '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Document reported successfully </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
          </button>
        </div>';
  } else {
    return   '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Something went wrong</strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
          </button>
        </div>';
  }
}
function reportFound($tmp, $file, $folder, $repoName, $repoId, $repoType, $repoLocation, $user)
{
  $repoDate = date('Y/m/d');
  # VERIFYING IF THERE IS'NT ANY SIMILAR LOST DOCUMENT
  $countSimilar = countAffectedRows('document_lost', "	doc_fullnames='$repoName' OR doc_serialcode='$repoId' LIMIT 1");
  # AVOIDING DATA REDUDANCY
  $countDocId   = countAffectedRows('document_found', "	doc_serialcode='$repoId' LIMIT 1");


  if ($countDocId) {
    return   '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong> Document is already reported </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
      </button>
    </div>';
  } else {
    if ($countSimilar) {
      #FETCH LOST DOC USER INFO
      $getSimilar = select('*', 'client,document_lost', "document_lost.doc_serialcode='$repoId' and document_lost.doc_founder=client.cli_id");
      if ($getSimilar) {
        foreach ($getSimilar as $similar) :
          $userPhone = $similar['cli_phone'];
          $userFirst = $similar['cli_fname'];
          $userLast  = $similar['cli_lname'];
          $userIde   = $similar['cli_id'];
        endforeach;
        $message = "Hello " . $userFirst . ' ' . $userLast . " Someone have reported a document with the same information as what you have claimed to lost , Please visit our system to verify if it is yours";
        # IF USER FOUND ,SEND SMS NOTIFICATION 
        sendSms($userPhone, $message);
        echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
      <strong> We found similar lost document , Sending notification ... </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
      </button>
    </div>';
      }
      $file1 = returnMixtring() . $file;
      $path = $folder . $file1;
      $data = ['id' => null, 'code' => $repoId, 'type' => $repoType, 'names' => $repoName, 'founder' => $user, 'status' => 0, 'date' => $repoDate, 'photo' => $file1, 'branch' => $repoLocation];
      $datastracture = '`doc_id`, `doctype_id`, `doc_serialcode`, `doc_fullnames`, `doc_founder`, `doc_status`, `doc_createdDate`, `doc_photo`, `bra_id`';
      $values = ':id,:type,:code,:names,:founder,:status,:date,:photo,:branch';
      insert('document_found', $datastracture, $values, $data);
      move_uploaded_file($tmp, $path);
      return   '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Document reported successfully </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
      </button>
    </div>';
    }
    else{
      $file1 = returnMixtring() . $file;
      $path = $folder . $file1;
      $data = ['id' => null, 'code' => $repoId, 'type' => $repoType, 'names' => $repoName, 'founder' => $user, 'status' => 0, 'date' => $repoDate, 'photo' => $file1, 'branch' => $repoLocation];
      $datastracture = '`doc_id`, `doctype_id`, `doc_serialcode`, `doc_fullnames`, `doc_founder`, `doc_status`, `doc_createdDate`, `doc_photo`, `bra_id`';
      $values = ':id,:type,:code,:names,:founder,:status,:date,:photo,:branch';
      insert('document_found', $datastracture, $values, $data);
      move_uploaded_file($tmp, $path);
      return   '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Document reported successfully </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
      </button>
    </div>';

    }
  }
}

function claim($client, $doc, $fees, $comment = null, $names, $address, $branch, $tel, $momo)
{
  $affectedRow = countAffectedRows('claim', "cli_id= '$client' and doc_id='$doc' and claim_status='SUCCESS'");
  if ($affectedRow == 0) {
    $refId = reference1();

    $data = ['cli_id' => $client, 'doc_id' => $doc, 'claim_ref' => $refId, 'claim_fees' => $fees, 'claim_comment' => $comment, 'claim_names' => $names, 'claim_address' => $address, 'Claim_branch' => $branch, 'claim_tel' => $tel, 'claim_status' => 'PENDING'];

    //$data array will store data to be inserted
    $dataStructure = 'cli_id, doc_id,claim_ref, claim_fees, claim_comment, claim_names, claim_address, Claim_branch, claim_tel, claim_status';
    //$dataStructure will hold datastructure of table
    $values = ' :cli_id, :doc_id,:claim_ref, :claim_fees, :claim_comment, :claim_names, :claim_address, :Claim_branch, :claim_tel, :claim_status';
    insert('claim', $dataStructure, $values, $data);
    update('document_found', 'doc_status=:doc_status', "doc_id='$doc'", ['doc_status' => '1',]);
    //flutterwave payment
    $redirectUrl = 'http://localhost/lost-and-found/approve';
    payment($fees, $momo, $names, $redirectUrl, $refId);
    return true;
  } else {
    echo $message = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong> Claim is already received</strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
      </button>
        </div>';
  }
}

function FoundNotification($fullNames, $docId, $docType)
{
  //best matches 1.same doc type and doc id 

  $CountBest = countAffectedRows('document_found', "doctype_id ='$docType' and doc_serialcode='$docId' and doc_status='0'");
  //worst matches 1.same id or doc owner name  
  $CountWorst = countAffectedRows('document_found', "doc_fullnames ='$fullNames' or doc_serialcode='$docId' and doc_status='0'");
  $result = ['best' => null, 'worst' => null];

  if ($CountBest == 1) {

    $SelectBest = select('*', 'document_found', "doctype_id ='$docType' and doc_serialcode='$docId' and doc_status='0'");
    $result['best'] = $SelectBest;
  }
  if ($CountWorst > 0) {
    $SelectWorst = select('*', 'document_found', "(doc_fullnames ='$fullNames' and (doc_serialcode='$docId' and doctype_id <>'$docType' )) or (doc_fullnames ='$fullNames' and (doc_serialcode<>'$docId' and doctype_id ='$docType' )) or (doc_fullnames ='$fullNames' and (doc_serialcode<>'$docId' and doctype_id <>'$docType' )) and doc_status='0'");
    $result['worst'] = $SelectWorst;
  } else return false;

  return $result;
}

function NotificationIteration($userId)
{
  $countLostDoc = countAffectedRows("document_lost", "doc_founder= '$userId' and  doc_status=0");
  if ($countLostDoc > 0) {
    $SelectLostDoc = select("*", "document_lost", "doc_founder= '$userId' and  doc_status= 0");
    foreach ($SelectLostDoc as $lostDoc) {
      $fullNames = $lostDoc['doc_fullnames'];
      $docId = $lostDoc['doc_serialcode'];
      $docType = $lostDoc['doctype_id'];
      $result = FoundNotification($fullNames, $docId, $docType);
      if ($result) {
        echo "lost document with number" . $docId;
      }

      if (isset($result['best'])) {
        echo "<br> best";
        foreach ($result['best'] as $r) {
          echo "<br>" . ($r['doc_id']);
        }
      }

      if (isset($result['worst'])) {
        echo "<br> worst";
        foreach ($result['worst'] as $r) {
          echo "<br>" . ($r['doc_id']);
        }
      }
      echo "<br>";
    }
  } else return "no document found";
}
