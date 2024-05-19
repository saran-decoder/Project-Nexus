<?php

class Webconn
{

    public function __construct()
    {
        global $_web_conn;
        $_web_conn_path = __DIR__.'/var/www/html/Project-Nexus/Project 2/config/connections.json';
        $_web_conn = file_get_contents($_web_conn_path);
        Database::getConnection();
    }

    public function initiateSession()
    {
        Session::start();
        if (Session::isset("session_token")) {
            try {
                Session::$usersession = UserSession::authorize(Session::get('session_token')); 
            } 
            catch (Exception $e){
                //TODO: Handle the initiate session exception error.
            }
        }
    }

}