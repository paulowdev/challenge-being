<?php
require '../bootstrap/bootstrap.php';
use App\Controllers\HomeController;


// Home page
$homePage = new HomeController();
$homePage->index();
