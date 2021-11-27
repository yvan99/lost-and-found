<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/cdh/server/core/init.php';
function CreateAudienceMeasure(){
    $date=date("Y-m-d");
    $token=verificationToken();
    $dataStructure = 'aud_token,date';
    $values =':aud_token,:date';
    $data = ['aud_token'=>$token,'date'=>$date];
    insert("audience",$dataStructure,$values,$data);
    return $token;

}

function ViewAudienceMeasure($scope){
    $Today=date("Y-m-d");
    if($scope=='day'){
        $selectionOfTodayAudience=select("count(*) ","audience","audience.date= '$Today' ");
        return $selectionOfTodayAudience[0]['count(*)'];
    
    }elseif($scope=='week'){
        $week=date('Y-m-d',minDate(7,'d'));
        $selectionOfWeekAudience=select("count(*) ","audience","audience.date>= '$week' ");
        return $selectionOfWeekAudience[0]['count(*)'];

    }
    elseif($scope=='month'){
        $month=date('Y-m-d',minDate(1,'m'));
        $selectionOfmonthAudience=select("count(*) ","audience","audience.date >= '$month' ");
        return $selectionOfmonthAudience[0]['count(*)'];

    }
    elseif($scope=='all'){
        $month=date('Y-m-d',minDate(1,'m'));
        $selectionOfmonthAudience=select("count(*) ","audience",1);
        return $selectionOfmonthAudience[0]['count(*)'];

    }
    
    
    

}



?>