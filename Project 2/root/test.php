<?php

include 'libs/broker.php';

$name = 'saran';
$pass = 'fubu@098';

$log = user::login($name, $pass);

if ($log) {
    echo 'Login Success';
} else {
    echo 'Login Failed';
}