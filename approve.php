<?Php
require 'inc/server.php';

 $resp=$_GET['resp'];
//converting string into array
$one=explode("{ }",$resp);
$array = array();
foreach ($one as $item){
    $array[] = explode(",",$item);
}

$refstring=$array[0][3];
$ref=explode(":",$refstring);
$ref= $ref[1];
$ref=str_replace('"', "", $ref);
//end of converting string into array and get ref_txt
update('claim', 'claim_status=:claim_status', "claim_ref='$ref'", ['claim_status'=>'SUCCESS',]);
header("location:index");






?>