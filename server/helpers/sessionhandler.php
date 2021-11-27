<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/lost-and-found/server/core/init.php';

function destroy_session()
{
    // remove all session variables
    session_unset();

    // destroy the session
    session_destroy();
}

function create_session($id,$user){
    $_SESSION[$user]=$id;

}

?>
