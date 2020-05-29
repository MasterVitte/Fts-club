<?php
/**
 * List routes
 */

$this->router->add('home', '/', 'HomeController:index');
$this->router->add('send', '/send', 'MailController:send', 'POST');
