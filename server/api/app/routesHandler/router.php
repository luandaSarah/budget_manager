<?php

/**
 * Cette fonction retire la derniere "/" de notre url pour le rendre plus SEO friendly
 * @param string $url
 * @return void
 */
function clearUrl(string $url)
{
    if (!empty($url) && $url !== '/expenses_manager/server/api/' && $url[-1] === '/') {
        $url = substr($url, 0, -1); // on va supprimer le dernier / de notre url

        // On redirige vers l'url propre
        http_response_code(301);
        header("Location: $url");
        exit(301);
    }
}

/**
 * Cette fonction permet de transformer {id} en int avec un regex dans l'url
 * @param string $routeUrl
 * @return string
 */
function urlIdHandler(string $routeUrl)
{

    $regex = preg_replace('#\{id\}#', '([0-9]+)', $routeUrl);

    return "#^" . $regex . "$#";
}

/**
 * Cette fonction va lancer la fonction controller qui correspond à la requette 
 * @param string $routeName
 * @param mixed $urlParam
 * @return void
 */
function useFunction(string $routeName, ?int $urlParam = null): void
{
    //on explose le nom de la route 
    $routeName = explode(".", $routeName);

    //on require le fichier du controller correspondant
    require_once "../api/app/controllers/$routeName[1].php";
    $function = $routeName[2] . ucfirst($routeName[1]);

    //si url contient un paramettre alors on lance lance la function avec un paramettre sinon on lance la function vide
    $urlParam ?   $function($urlParam) :  $function();
}




function router(): void
{
    $url = $_SERVER['REQUEST_URI'];

    clearUrl($url);
    ///on recupere l'url
    //on retire le domaine
    $url = explode("/expenses_manager/server/api", $url);


    //on boucle sur nos routes
    foreach ($_SESSION["routes"]  ?? [] as $route) {
        //on passe url  de la route  dans la fucntion 
        $regexRoute = urlIdHandler($route['url']);

        //si le pattern de l'url dans la route match avec l'url de la requette
        if (preg_match($regexRoute, $url[1], $matches)) {
            //si trouvé alors
            $isFound = true;
            //s'il ya bien un parametre celui ci prend la valeur de ce que le matche a recupere dans le regex entre parenthese(on le convertie en int)
            //sinon on le passe en null
            $param = isset($matches[1]) ? (int)$matches[1] : null;

            //on lance la fonction 
            useFunction($route['name'], $param);
            break;
        }
    }

    if (!isset($isFound)) {
        //si on ne trouve rien alors erreur 404
        http_response_code(404);
        echo '404 - Rien à été trouvé';
        exit(404);
    }
}
    //on renvoie un code erreur http si la route n'existe pas
