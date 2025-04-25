<?php

require_once '../api/app/requests/users.php';
require_once '../api/app/routesHandler/routes';

$test = findAllUsers();


function testRoutes(): void
{
    //on crée dans un premier temps la route
    createRoute("api.users.get", "/users", ["GET"] );
    

}
// header('Content-Type: application/json');
// http_response_code(404);
// echo json_encode($content);