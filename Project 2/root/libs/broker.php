<?php

/**
 * This broker file load to all included file's.
 */

include_once 'includes/Database.php';
include_once 'includes/Webconn.php';
include_once 'includes/Session.php';
include_once 'includes/UserSession.php';
include_once 'includes/User.php';

// That object is implementing the initiate session and json file path
$webconn = new Webconn();
$webconn->initiateSession();

// This function used to decode the json file
function get_config($key, $default=null) {
    global $_web_conn;
    $arr = json_decode($_web_conn);
    if (isset($arr[$key])) {
        return $arr[$key];
    } else {
        return $default;
    }
}