<?php
## get dates difference

function getdiff($date1, $date2)
{
    $firstDate = new DateTime($date1);
    $seconDate = new DateTime($date2);

    $diff = $seconDate->diff($firstDate);

    $hourDiff = $diff->h;
    $hourDiff = $hourDiff + ($diff->days * 24);

    return $hourDiff;
}
function getPagename()
{
    # GDISPLAY PAGE NAME WITHOUT .PHP EXTENSION
    $curPageName = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
    $removephp   = substr($curPageName, 0, -4);
    return $removephp;
}

function usernamecharacters($firstname, $lastname)
{
    #COMBINE FIRST AND LAST NAME TO GET USERNAMBE BADGE

    $removeAtfirst = substr($firstname, 0, 1);
    $removeAtlast  = substr($lastname, 0, 1);

    $combineChars = $removeAtfirst . $removeAtlast;
    return $combineChars;
}

function getFirstChar($firstname)
{
    #COMBINE FIRST AND LAST NAME TO GET USERNAMBE BADGE

    $removeAtfirst = substr($firstname, 0, 1);
  
    return $removeAtfirst;
}

function removeyearfirst()
{
    # remove first 2 characters on a year
    $ourYear = date('Y');
    $remove  = substr($ourYear, 2);
    return $remove;
}

function createFolder($foldername)
{
    # create a folder
    $create = mkdir($foldername, 0777, true);
    return $create;
}
function decodeTohtml($messageTodecode)
{
    #decode to html characters

    $toHtmlmesage = html_entity_decode($messageTodecode, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    return $toHtmlmesage;
}

function  returnHash()
{
    $sstr         = '1234567890aABCDEFGHIJKLMNOPRSTUVWYZX';
    $sstr         = str_shuffle($sstr);
    return $sstr;
}
function getPrefix($string,$interval)
{
    #GET A STRING PREFIX
    $removePrefix  = substr($string, 0, $interval);
    return $removePrefix;
}
function returnMixtring(){
    $sstr         = '1234567890aABCDEFGHIJKLMNOPRSTUVWYZX';
    $sstr         = str_shuffle($sstr);
    $mix = substr($sstr,0,7);
    return $mix;
}
function compareDates($date1,$date2){
// date into dateTimestamp
$dateTimestamp1 = strtotime($date1);
$dateTimestamp2  = strtotime($date2);
// Compare the timestamp date 
if ($dateTimestamp1 > $dateTimestamp2){
    return 'first';
}
elseif ($dateTimestamp1 = $dateTimestamp2) {
    return 'equal';
}
else{
    return 'second';
}
}

function deleteDirectory($dir) {
    if (!file_exists($dir)) {
        return true;
    }

    if (!is_dir($dir)) {
        return unlink($dir);
    }

    foreach (scandir($dir) as $item) {
        if ($item == '.' || $item == '..') {
            continue;
        }

        if (!deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
            return false;
        }

    }

    return rmdir($dir);
}
function textWrap($text, $textScope)
{
    $wrapped = mb_strimwidth($text, 0, $textScope, "...");
    return $wrapped;
}
