<?php

// DB Settings
const DB_HOST = 'database';
const DB_USER = 'root';
const DB_PASS = 'tiger';
const DB_NAME = 'todo';

define('ROOT', dirname(__FILE__). '/');
define('HOST', 'https://'.$_SERVER['HTTP_HOST'].'/');

function p($var)
{
    echo '<pre>';
    print_r($var);
    echo '</pre>';
}

function pd($var)
{
    echo '<pre>';
    print_r($var);
    echo '</pre>';
    die();
}