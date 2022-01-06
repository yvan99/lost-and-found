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
              'db' => 'lostfound_db'
       ),
);

include_once $_SERVER['DOCUMENT_ROOT'] . '/lost-and-found/server/config/config.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/lost-and-found/server/db/db.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/lost-and-found/server/helpers/phpmailer/resetEmail.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/lost-and-found/server/helpers/hashinghandler.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/lost-and-found/server/helpers/url.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/lost-and-found/server/helpers/passwordhandler.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/lost-and-found/server/helpers/sanitizer.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/lost-and-found/server/helpers/sessionhandler.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/lost-and-found/server/helpers/sqlQueries.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/lost-and-found/server/helpers/utilities.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/lost-and-found/server/helpers/tokenhandler.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/lost-and-found/server/helpers/dateHandler.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/lost-and-found/server/helpers/sms.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/lost-and-found/server/controllers/agent.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/lost-and-found/server/controllers/admin.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/lost-and-found/server/controllers/client.php';