<?php
// url-response.php


// get url sended
if (!defined('REQUEST_URI'))
    define('REQUEST_URI', str_replace(__DIR__, '', $_SERVER['REQUEST_URI']));


function getResponseUrl($urlArray)
{
    foreach ($urlArray as $pcre => $file) {
        if (preg_match("@^{$pcre}$@", REQUEST_URI, $_POST)) {
            include($file);
            exit();
        } else {
            $msg = "<h1>404 - Page not found.</h1>";
        }
    }
}