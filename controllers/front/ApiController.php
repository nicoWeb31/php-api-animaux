<?php 

require_once "models/front/ApiManager.php";

class ApiController 
{


    private $apiManager;

    public function __construct()
    {
        $this->apiManager = new ApiManager();
    }



    /**
     * Permet de recuperer d'envoyer la resource au router
     *
     * @return void
     */
    public function getAnimaux(){
        $animaux = $this->apiManager->getDbAnimaux();
        var_dump($animaux);
    }

    /**
     * Permet de recuperer d'envoyer la resource au router pour un animal
     *
     * @return void
     */
    public function getAnimal($id){
        echo "animaux {$id}";
    }


    /**
     * Permet de recuperer d'envoyer la resource au router  sur les continents
     *
     * @return void
     */
    public function getContinents(){
        echo "Continent";
    }

    /**
     * Permet de recuperer d'envoyer la resource au router sur les familles
     *
     * @return void
     */
    public function getFamilles(){
        echo "Familles";
    }
}