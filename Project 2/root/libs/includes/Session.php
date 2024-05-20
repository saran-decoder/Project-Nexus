<?php

class Session
{

    /**
     * This all functions use to any fils,
     * because i'm used to static method and that all file's,
     * i'm included to main broker file.
     */

    public static $isError = null;
    public static $user = null;
    public static $usersession = null;

    // Session start function
    public static function start()
    {
        session_start();
    }

    // Session unset function
    public static function unset()
    {
        session_unset();
    }

    // Session destroy function
    public static function destroy()
    {
        session_destroy();
    }

    // This is set the key & valu fnction
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    // This is a isset function
    public static function isset($key)
    {
        return isset($_SESSION[$key]);
    }

    // This is use to get the session key's
    public static function get($key, $default=null)
    {
        if (Session::isset($key)) {
            return $_SESSION[$key];
        } else {
            return $default;
        }
    }

    // This return current user
    public static function getUser()
    {
        return Session::$user;
    }

    // This is return current user session
    public static function getUserSession()
    {
        return Session::$usersession;
    }

    // This is render the all templates in the script
    public static function loadTemplates($name, $data = [])
    {
        extract($data);
        $load = $_SERVER['DOCUMENT_ROOT'] . get_config('root_path') . "_templates/$name.php";
        // die($load)
        if (is_file($load)) {
            include $load;
        } else {
            // TODO: Handle not file error message
        }
    }

    // This function is render the base template
    public static function renderPage()
    {
        return Session::loadTemplates('_main');
    }

    // This is the sample auth implementation
    public static function isAuthenticated()
    {
        if (is_object(Session::getUserSession())) {
            return Session::getUserSession()->isValid();
        }
        return false;
    }

    // This function return to the user current file name
    public static function currentfile()
    {
        return basename($_SERVER['SCRIPT_NAME'], '.php');
    }

}