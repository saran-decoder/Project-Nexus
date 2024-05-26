<?php

class User
{
    private $conn;    
    public $id;
    
    public function __construct($email)
    {
        $this->conn = Database::getConnection();
        $sql = "SELECT `id` FROM `auth` WHERE `email` = '$email' LIMIT 1";
        $res = $this->conn->query($sql);
        if ($res->num_rows) {
            $row = $res->fetch_assoc();
            $this->id = $row['id'];
        } else {
            throw new Exception('Some problem in user');
        }
    }

    public static function signup($name, $email, $phone, $password)
    {
        $conn = Database::getConnection();
        $option = [
            'cost' => 9,
        ];
        $pass = password_hash($password, PASSWORD_BCRYPT, $option);
        $sql = "INSERT INTO `auth` (`username`, `email`, `phone`, `password`) VALUES ('$name', '$email', '$phone', '$pass')";
        try {
            $conn->query($sql);
            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public static function login($email, $pass)
    {
        $conn = Database::getConnection();
        $sql = "SELECT * FROM `auth` WHERE `email` = '$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($pass, $row['password'])) {
                return $row['email'];
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}