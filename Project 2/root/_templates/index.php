<?php

if (Session::isAuthenticated()) {
    Session::loadTemplates('main_page/home');
} else {
    ?>
        <section class="contain forms">

            <!-- Login Form -->
            <?php Session::loadTemplates('auth_page/login'); ?>

            <!-- Signup Form -->
            <?php Session::loadTemplates('auth_page/signup'); ?>

        </section>
    <?php
}
?>