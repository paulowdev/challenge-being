<?php
// app-config.php

// Doctrine database configuration
$GLOBALS['db_driver'] = 'pdo_mysql';
$GLOBALS['db_user'] = 'root';
$GLOBALS['db_password'] = '123456';
$GLOBALS['db_name'] = 'challenge_being_db';
$GLOBALS['doctrine_dev_mode'] = true;

// Email and SMTP configuration
$GLOBALS['smtp_from_email'] = 'from_email@gmail.com';
$GLOBALS['smtp_host'] = 'smtp.gmail.com';
$GLOBALS['smtp_auth'] = true;
$GLOBALS['smtp_username'] = 'email@gmail.com';
$GLOBALS['smtp_password'] = 'your_password';
$GLOBALS['smtp_secure'] = 'tls';
$GLOBALS['smtp_port'] = 587;


// Paths
$GLOBALS['path_public'] = '../public/'; // No change
$GLOBALS['path_components'] = '../app/Views/components/'; // No change
$GLOBALS['path_models'] = '../app/Models/'; // No change
$GLOBALS['path_composer'] = '../../vendor/autoload.php'; // No change
