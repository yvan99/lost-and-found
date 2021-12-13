<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/lost-and-found/server/core/init.php';

class client{
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
      $affectedRow = countAffectedRows('client', "cli_email= '$this->email'");

      //$affectedRow will verify if email is already registerd


      if ($affectedRow == 0) {
        $token = verificationToken();

        //this token sent to user

        $data = ['cli_fname' => $this->fname, 'cli_lname' => $this->lname, 'cli_email' => $this->email, 'cli_password' =>$hashedpassword, 'cli_phone' => $this->phone, 'cli_status' => 1,];

        //$data array will store data to be inserted
        $dataStructure = 'cli_fname, cli_lname, cli_email, cli_password, cli_phone, cli_status';
        //$dataStructure will hold datastructure of table
        $values = ':cli_fname, :cli_lname, :cli_email, :cli_password, :cli_phone, :cli_status';

        insert('client', $dataStructure, $values, $data);

        // $email =explode("@",$this->email);
        //$emailP1=$email[0];
        //$emailP2=$email[1];

        //start of section for sending mail to verify signed up user
        //echo '<script type="text/javascript">window.location =("account_verification?data=' .actor($emailP2) . '&&state='.actor($emailP1). ' ")</script>';
        $userBody='`
        <table style="padding:0px;border:0px solid #DDD;margin:0 auto;font-family:calibri;font-weight:bold;">
        
        <tr><td style="padding:10px 30px;margin:0;text-align:left;">
        Hello '.$this->fname.' '.$this->lname. ' Welcome to lost & found , we are pleased to announce to you that your account  have been successfully created ' . ' <h2 style="color:#dc3545">' . $token . ' </h2> ' . ' Is your account verification code' . '<br>' 
        . 'You will use it to access your account :' . 'Do not share any information provided with anyone and if you have any issues with your account do not hesitate to contact us
        
        Kindly Regards,<br> lost&found support team <br><br></td></tr>
  
  
                    
                    
          
        </table>
        
        
        
        `';
        resetpasswordmail($this->email,$userBody,'account verification');
      

        //end of section
        return true;
      } else return false;
   


  }

  function signin($email, $password)
  {

    $email = escape($email);
    $password = escape($password);
    $count = countAffectedRows('client', "cli_email='$email'");


    if ($count == 1) {

      //from here we are sure that email are registered

      $rows = select('*', 'client', "cli_email='$email' and cli_status = 1 ");
      $hash = null;


      foreach ($rows as $row)  $hash = $row['cli_password'];


      //selection of hashed password stored in db

      foreach ($rows as $row) $id = $row['cli_id'];
      $id;

      $log = verify_password($password, $hash);
      if ($log) {
        $log;
        session_start();
      $_SESSION['clientIdLost']=$id;
       // create_session($id, 'client');
       header('location:./');
      } else{
        $message = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong> Invalid credentials , try again </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>';
    return $message;
      }
        
    }
  }

  function logout()
  {
    destroy_session();
    return true; //
  }

  function resetpassword($email)
  {
        $email=escape($email);
        $count=countAffectedRows('admin', "adm_email='$email' and adm_status = 1");
    
        if ($count!=1) {
            return false;
        } else {
            $token=verificationToken();
            $row=select('*', 'admin', "adm_email='$email' and adm_status = 1");
            #selection of admin id  belongs to email provided
            foreach ($row as $admin) {
                $admName=$admin['adm_fname'].' '.$admin['adm_lname'];
                
                $adminId=$admin['adm_id'];
            }
            #this will expire all token belong to member befor sending other
            update('verification_token', 'vt_status=:vt_status', "vt_userId='$adminId' and vt_status=1", ['vt_status'=>0,]);
            #$data array will store data to be inserted
            $data = [
        'vt_token' =>$token,
        'vt_indate'=>date('Y-m-d  h:i:s'),
        'vt_user' =>'admin',
        'vt_userId' =>$adminId,
        'vt_status'=>'1',
        ];
            #$dataStructure will hold datastructure of table
            $dataStructure='vt_token, vt_indate, vt_user, vt_userId, vt_status';
            #$values
            $values=':vt_token, :vt_indate, :vt_user, :vt_userId, :vt_status';
            echo '<script type="text/javascript">window.location =("emailsent")</script>';

            insert('verification_token', $dataStructure, $values, $data);

            $resetlink="http://localhost/lost-and-found/resetlastStep?token=".actor($token);
            
         
            $userSubject="Reset your password";

            
            $userBody='`
            <table style="padding:0px;border:0px solid #DDD;margin:0 auto;font-family:calibri;font-weight:bold;">
            <tr>
                    <td style="background-color:#fff;padding:10px 30px;margin:0;font-size:2.5em;color:#4A7BA5;text-align:center;">
                      <img src="https://jausolutions.com/justbetweenus/media/LOGO.png"style="width:250px;">
                    </td>
                  </tr>
            <tr><td style="padding:10px 30px;margin:0;text-align:left;">
            Hi '.$admName.'There was a request to change your password! If you did not make this request then please ignore this email.<br>

            
            Otherwise, please click this link to change your password: </h6> click <a href='."$resetlink".'> here </a> to reset your account '.$resetlink.'<br>
            
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
              $idSelection=select('*','verification_token,admin',"vt_token ='$token' and admin.adm_id = verification_token.vt_userId ");
              foreach($idSelection as $ids){
                $id=$ids['vt_userId'];
                // $affCode=$id['aff_code'];
               
              }
              $hashedpassword=create_hash(escape($password));
              update('admin', 'adm_password=:adm_password', "adm_id='$id'", ['adm_password'=>$hashedpassword,]);
              #update token to verified
              update('verification_token', 'vt_status=:vt_status', "vt_token='$token'", ['vt_status'=>9,]);
            //   create_session($affCode,'affiliate');
              header("location:dashboard");
              return true;
  }

  function Acceptedpassword()
  {
  }






?>