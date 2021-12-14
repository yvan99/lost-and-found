<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/lost-and-found/server/core/init.php';
session_start();
destroy_session();
header("location:./");
?>