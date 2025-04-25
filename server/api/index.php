<?php

session_start();


require './app/routesHandler/routes.php';
require './app/routesHandler/router.php';

initRoutes();
var_dump($_SESSION["routes"]);

var_dump(router());