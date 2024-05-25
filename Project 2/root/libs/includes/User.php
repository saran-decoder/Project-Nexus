<?php

class User
{
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

    public static function login($name, $pass)
    {
        $conn = Database::getConnection();
        $sql = "SELECT * FROM `auth` WHERE `username` = '$name'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($pass, $row['password'])) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}