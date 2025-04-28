<?php

require_once '../api/app/requests/users.php';
// require_once '../api/app/routesHandler/routes';



//on crée dans un premier temps la route

function getAllUsers(): void
{
    $content = findAllUsers();
    header('Content-Type: application/json');
    http_response_code(200);
    echo json_encode($content);
}

function getOneUsers(int $id): void
{
    $content = findOneUser($id);

    if (!$content) {
        header('Content-Type: application/json');
        http_response_code(response_code: 404);
        echo json_encode("Utilisateur introuvable");
    } else {
        header('Content-Type: application/json');
        http_response_code(200);
        echo json_encode($content);
    }
}
