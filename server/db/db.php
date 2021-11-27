<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/lost-and-found/server/core/init.php';

// connecting to DB

$host = strval(config::get('mysql/host'));
$user = strval(config::get('mysql/username'));
$db= strval(config::get('mysql/db'));
$pass = strval(config::get('mysql/password'));

// dsn integration

$newsdn = 'mysql:host='.$host.';dbname='.$db;

// variable to connect
try {
   
    $dbConnection = new PDO($newsdn,$user,$pass);

// disable emulation makes us able to use limit on selects

$dbConnection->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
  


} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
    
}
