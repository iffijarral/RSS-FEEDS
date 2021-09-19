<?php
require 'Config.php';

function escape($string)
{
    return htmlentities($string, ENT_QUOTES, 'UTF-8');
}

function appName()
{
    echo Config::get('app/name');
}