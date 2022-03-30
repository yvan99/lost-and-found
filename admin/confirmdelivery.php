<?Php
require 'inc/server.php';
$deliverId = unhash($_GET['delivery']);
update('document_delivery', 'docd_status=:docd_status', "docd_id='$deliverId'", ['docd_status'=>'1',]);
header("location:logistics");
