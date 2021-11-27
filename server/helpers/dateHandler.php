<?php

function minDate($scope,$measurement){
    $TODAY=date("Y/m/d");
    //this is function that calculate minmum date  
    //it has 2 paramater one for scope/time length and Today for current date
    $Todaysec=strtotime($TODAY);
    if ($measurement=='m') {
         $scopeSec=$scope*2628002.88;
    } elseif($measurement=='d'){
        $scopeSec=$scope*86400;
    }

        return $Todaysec-$scopeSec;
    
    

}?>