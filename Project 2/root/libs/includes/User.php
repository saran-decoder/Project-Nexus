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
}