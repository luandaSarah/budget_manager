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

function openFile($file): void
{
    //on ajoute .php au fichier
    // $file .= $file . ".php";
    

}



function router(): void
{
    $url = $_SERVER['REQUEST_URI'];

    clearUrl($url);
    ///on recupere l'url
    //on retire le domaine
    $url = explode("/expenses_manager/server/api", $url)[1];

    //on boucle sur nos routes
    foreach ($_SESSION["routes"]  ?? [] as $route) {
        if (preg_match('#^' . $route['url'] . '$#', $url)) {
            //on envoie vers le fichier controller correspondant à la route et puis il faut aussi appeler la function 
            openFile($route['url']);
        }
    }
    //on renvoie un code erreur http si la route n'existe pas
    http_response_code(404);
    echo '404 - Not found';
    exit(404);
}
