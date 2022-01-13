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
    
    

}


function calcPostedDay($date)
{
    
            /**
         * This function calculates difference between given date and today `s  date  
         *
         * @param string  $date A date of day you want to campare with today `s date 
         
        */

            $today=date('Y/m/d');
            $differenceinsec= strtotime($today)-strtotime($date);
            $TotalsecinDay=60*60*24;
            $differenceinday=$differenceinsec/$TotalsecinDay;
            

            if($differenceinday==0) return "Today";
            elseif($differenceinday<=30)return $differenceinday." days";
            elseif($differenceinday>30){
                
                $month=$differenceinday/3;
                if ($month<=12) {
                    return floor($month)." months";
                }

                elseif($month>12){
                    $year=$month/12;
                    return floor($year)." years";
                }
            
            }
    
}
   




?>