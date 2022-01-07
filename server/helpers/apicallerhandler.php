<?php
class apicaller{

    function post($data,$url){
                  
                   // create & initialize a curl session
                   $curl = curl_init($url);
                   // set our url with curl_setopt()
                   curl_setopt($curl, CURLOPT_POST, 1);
                   curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);

                   curl_setopt($curl, CURLOPT_POSTFIELDS,json_encode($data));
                     // close curl resource to free up system resources
                    // (deletes the variable made by curl_init)
                    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                        'Authorization:Bearer FLWSECK-d055b666e4be1eb6fd56929873f22deb-X',
                        'Content-Type: application/json', ));
                        // $output contains the output string
                        // curl_exec() executes the started curl session
                    $output =json_decode(curl_exec($curl),true);
                    curl_close($curl);
                   

                    return $output;




    }

    function get($url){
         // create & initialize a curl session
         $curl = curl_init($url);
         // set our url with curl_setopt()
        //  curl_setopt($curl, CURLOPT_GET, 1);
         curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);

         
           // close curl resource to free up system resources
          // (deletes the variable made by curl_init)
          curl_setopt($curl, CURLOPT_HTTPHEADER, array(
              'Authorization:Bearer FLWSECK-d055b666e4be1eb6fd56929873f22deb-X',
              'Content-Type: application/json', ));
              // $output contains the output string
              // curl_exec() executes the started curl session
          $output =json_decode(curl_exec($curl),true);
          curl_close($curl);
         

          return $output;

    }


    function put(){
        
    }

    function delete(){

    }
    
}




?>