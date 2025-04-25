<?php

/**
 * Cette fonction crée une clé "routes" dans la session correspondant à toute les routes de notre appli
 * On le crée en session pour pouvoir y acceder depuis l'ensemble de notre appli
 * @return array
 */
function InitRoutes(): array
{
    //si la clé "routes" n'existe pas en session, on crée et retourne la clé qui à pour valeur un tableau vide
    if (!in_array('routes', $_SESSION)) {
        return $_SESSION["routes"] = [];
    }
    //Si elle existe on retourne le tableau de routes
    return $_SESSION["routes"];
}

InitRoutes();
/**
 * Cette fonction prend en paramettre les informations de la route que l'on souhaite ajouter afin de créer une nouvelle route
 * @param string $name
 * @param string $url
 * @param array $methods
 * @return void
 */
function createRoute(string $name, string $url, array $methods): void
{
    //On crée un tableau associatif qui correspond à notre nouvelle route
    $newRoute = [
        "name" => $name,
        "url" => $url,
        "methods" => $methods
    ];
    //on vérifie si la route existe déjà dans notre tableau $routes en session
    //si oui on arrete tout
    if (isset($_SESSION["routes"]) && in_array($newRoute,  $_SESSION["routes"])) {
        return;
    }
    //si non, on ajoute la nouvelle route dans notre array routes
    array_push($_SESSION["routes"], $newRoute);
}

var_dump($_SESSION["routes"]);
