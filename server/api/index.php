<?php

require_once 'autoloader.php';

use API\Autoloader;
use API\DB\Database;


//autoloader pour le chargement des classes
Autoloader::register();


$test = (new Database)
    ->getInstance()
    ->query("SELECT * FROM users")
    ->fetchAll();

var_dump($test);
