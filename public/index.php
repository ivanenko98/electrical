<?php
require_once '../vendor/autoload.php';

$config = require('../config/database.php');
$application = new \app\Application($config);
//var_dump($application);
$application->run();