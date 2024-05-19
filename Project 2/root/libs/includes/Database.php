<?php

class Database
{

    public static $conn = null;

    public static function getConnection() {

        if (Database::$conn == null) {

            $servername = get_config('load_server');
            $username = get_config('load_username');
            $password = get_config('load_password');
            $db_name = get_config('load_db_conn');

            $connection = new mysqli($servername, $username, $password, $db_name);

            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            }
            else {
                Database::$conn = $connection;
                return Database::$conn;
            }

        } else {
            return Database::$conn;
        }
    }
}