<?php

if (Session::isAuthenticated()) {
    Session::loadTemplates('main_page/home');
} else {
    ?>
        <section class="contain forms">

            <!-- Login Form -->
            <?php Session::loadTemplates('auth_pages/login'); ?>

        </section>
    <?php
}
?>