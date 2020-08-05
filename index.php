<?php 
//http://localhost/...
//https://www.h2prog.com/...
define("URL", str_replace("index.php","",(isset($_SERVER['HTTPS']) ? "https" : "http").
"://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

require_once "controllers/front/ApiController.php";
$apiController = new ApiController();


try{
    if(empty($_GET['page'])){
        throw new Exception("La page n'existe pas");
    } else {
        $url = explode("/",filter_var($_GET['page'],FILTER_SANITIZE_URL));
        echo var_dump($url[0]);
        if(empty($url[0]) || empty($url[1])) throw new Exception ("La page n'existe pas");
        switch($url[0]){
            //routing pour le front
            case "front" : 
                switch($url[1]){
                    //ressource json collection animaux
                    case "animaux": $apiController->getAnimaux();
                    break;

                    //donne une ressorce animal
                    case "animal": 
                        if(empty($url[2])){
                            throw new Exception ("La page n'existe pas il manque l'id");
                        }
                        
                        $apiController->getAnimal($url[2]);
                    break;

                    
                    //ressource json collection continent
                    case "continents": $apiController->getContinents();
                    break;
                    
                    //ressource json collection familles
                    case "familles": $apiController->getFamilles();
                    break;
                    default : throw new Exception ("La page n'existe pas");
                }
            break;
            //routeur pour le page du back
            case "back" : echo "page back end demandée";
            break;
            default : throw new Exception ("La page n'existe pas");
        }
    }
} catch (Exception $e){
    $msg = $e->getMessage();
    echo $msg;
}