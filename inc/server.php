<?php 
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/lost-and-found/server/core/init.php';
@$user =$_SESSION['clientIdLost'];
$userSelect = select('*','client',"cli_id='$user'");
foreach ($userSelect as $useRow):
    $userId = $useRow['cli_id'];
endforeach;
