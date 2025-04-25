<?php

require_once '../api/app/requests/users.php';

$test = findAllUsers();

// header('Content-Type: application/json');
// http_response_code(404);
// echo json_encode($content);