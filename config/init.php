<?php
const DEBUG = 1;

define('ROOT', dirname(__DIR__));
const CONFIG = ROOT . '/config';
const WWW = ROOT . '/public';
const APP = ROOT . '/app';
const CORE = ROOT . '/vendor/mvc/core';
const LIBS = ROOT . '/vendor/mvc/core/libs';
const CACHE = ROOT . '/tmp/cache';

$app_path = "https://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";
$app_path = preg_replace("#[^/]+$#", '', $app_path);
$app_path = str_replace('/public/', '', $app_path);
define("PATH", $app_path);
//define("ADMIN", PATH . '/admin');

//define('LAYOUT', 'default');
define('LAYOUT', 'astro');

require_once ROOT . '/vendor/autoload.php';