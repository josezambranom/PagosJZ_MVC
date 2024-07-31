<?php
// App root directory (Connection to db, functions, autoload and dotenv)
use Dotenv\Dotenv;
use Models\ActiveRecord;

require __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

require 'functions.php';
require 'database.php';
ActiveRecord::setDB($db);

?>