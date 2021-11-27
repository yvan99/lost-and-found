<?php
// PROJECT INITIALISATION FILE
//require_once __DIR__ . "/../bootstrap.php";
$appEmail = '';
$appPass   = '';
$GLOBALS['config'] = array(
       'mysql' => array(
              'host' => 'localhost',
              'username' => 'root',
              'password' => '',
              'db' => 'cdh_db'
       ),
       'remember' => array(
              'cookie_name' => 'hash',
              'cookie_expriry' => '604800'
       ),
       'session' => array(
              'session_manager' => 'manager',
              'session_store' => 'store',
              'session_client' => 'client',
              'session_logistic' => 'logistic',
              'session_finance' => 'finance',
              'token_name' => 'token'

       ),


);

include_once $_SERVER['DOCUMENT_ROOT'] . '/cdh/server/config/config.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/cdh/server/db/db.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/cdh/server/helpers/phpmailer/resetEmail.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/cdh/server/helpers/hashinghandler.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/cdh/server/helpers/url.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/cdh/server/helpers/passwordhandler.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/cdh/server/helpers/sanitizer.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/cdh/server/helpers/sessionhandler.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/cdh/server/helpers/sqlQueries.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/cdh/server/helpers/utilities.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/cdh/server/helpers/tokenhandler.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/cdh/server/helpers/metricsHandler.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/cdh/server/helpers/dateHandler.php';