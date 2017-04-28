<?php
// configure your app for the production environment
// This must go outside version system !!!

date_default_timezone_set('Europe/Madrid');

// enable the debug mode
$app['debug'] = true;

// DoctrineServiceProvider opciones para la BD

$app['db.options'] = array(
    'driver' => 'pdo_mysql',
    'dbname' => 'reunion',
    'host' => 'localhost',
    'user' => 'reunion',
    'password' => 'SuperBigPassword2000.',
    'charset' => 'utf8mb4',
    'driverOptions' => array(1002 => 'SET NAMES utf8mb4'),
);

$app['kernel.private_upload_dir'] = '/var/private_upload/';