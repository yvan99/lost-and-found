<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/lost-and-found/server/core/init.php';
if (!$_SESSION['adminIdLost']) {
    header('location:logout');
} else {
    $adminSession = $_SESSION['adminIdLost'];
    $adminSelect = select('*', 'admin', "adm_id='$adminSession'");
    foreach ($adminSelect as $admin) {
        $names = $admin['adm_fullnames'];
    }
    $countClients = countAffectedRows('client', "cli_status='1'");
    $countBranches = countAffectedRows('branch', "1");
    $countLost = countAffectedRows('document_lost', "1");
    $countFound = countAffectedRows('document_found', "1");
    $countAgents = countAffectedRows('agent', "1");
    $countClaims = countAffectedRows('claim', "1");
    $countDelivery = countAffectedRows('document_delivery', "1");
    $successDelivery = countAffectedRows('document_delivery', "docd_status='1'");
    $pendingDelivery = countAffectedRows('document_delivery', "docd_status='0'");

}
