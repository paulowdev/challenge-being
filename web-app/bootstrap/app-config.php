<?php
// app-config.php

// Database configuration
$GLOBALS['db_driver'] = 'pdo_mysql';
$GLOBALS['db_user'] = 'root';
$GLOBALS['db_password'] = '123456';
$GLOBALS['db_name'] = 'challenge_being_db';

//Doctrine configuration
$GLOBALS['doctrine_dev_mode'] = true;

// Email and SMTP configuration
$GLOBALS['smtp_from_email'] = 'email@gmail.com';
$GLOBALS['smtp_host'] = 'smtp.gmail.com';
$GLOBALS['smtp_auth'] = true;
$GLOBALS['smtp_username'] = 'email@gmail.com';
$GLOBALS['smtp_password'] = 'your_password';
$GLOBALS['smtp_secure'] = 'tls';
$GLOBALS['smtp_port'] = 587;


// PATHS
$GLOBALS['path_public'] = '../public/';
$GLOBALS['path_components'] = '../app/Views/components/';
$GLOBALS['path_models'] = '../app/Models/';
$GLOBALS['path_composer'] = '../../vendor/autoload.php';
