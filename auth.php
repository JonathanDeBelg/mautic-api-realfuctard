<?php


include __DIR__ . '/vendor/autoload.php';

use Mautic\Auth\ApiAuth;

session_start();

// ApiAuth->newAuth() will accept an array of Auth settings
$settings = [
    'userName'   => // USER,
    'password'   => // PASSWORD
];

// Initiate the auth object specifying to use BasicAuth
$initAuth = new ApiAuth();
$auth     = $initAuth->newAuth($settings, 'BasicAuth');

// var_dump($auth);