<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/cdh/server/core/init.php';

function destroy_session(){
    // remove all session variables
    session_unset();

    // destroy the session
    session_destroy();
}

?>
