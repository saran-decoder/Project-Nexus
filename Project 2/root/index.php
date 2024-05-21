<?php

include 'libs/broker.php';

if (isset($_GET['logout'])) {
    Session::destroy();
    header("Location: /Project-Nexus/Project 2/root/");
    die();
} else {
    Session::renderPage();
}