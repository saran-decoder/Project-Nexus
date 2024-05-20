<?php

include 'libs/broker.php';

if (isset($_GET['logout'])) {
    Session::destroy();
    header("Location: ./");
    die();
} else {
    Session::renderPage();
}