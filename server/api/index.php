<?php

session_start();


require './app/routesHandler/routes.php';
require './app/routesHandler/router.php';

initRoutes();

//Users
createRoute("api.users.getAll", "/users", ["GET"]);
createRoute("api.users.getOne", "/users/{id}", ["GET"]);

router();

// var_dump($_SESSION["routes"]);

// var_dump(router());