<?php 

require_once "models/front/ApiManager.php";
require_once "models/Model.php";

class ApiController 
{


    private $apiManager;


    public function __construct()
    {
        $this->apiManager = new ApiManager();
        
    }


    /**
     * Perment de formatter les datas pour animaux et animal
     *
     * @return array
     */
    private function formatAnimaux($lignes)
    {

        $tab = [];

        foreach($lignes as $ligne){
            if(!array_key_exists($ligne['animal_id'],$tab)){

                $tab[$ligne['animal_id']] = [
                    "id" => $ligne['animal_id'],
                    "nom" => $ligne['animal_nom'],
                    "description" => $ligne['animal_description'],
                    "image" => URL."public/img/".$ligne['animal_image'],
                    "famille" => [
                        "idFamille" => $ligne['famille_id'],
                        "libelleFamille" => $ligne['famille_libelle'],
                        "DescFamille" => $ligne['famille_description']
                    ]
                ];

            }

            $tab[$ligne['animal_id']]["continents"][] = [

                "idContinent" => $ligne['continent'],
                "continentLibelle" => $ligne['continent_libelle']

            ];




        }


        return $tab;

    }


    /**
     * Permet de recuperer d'envoyer la resource au router
     *
     * @return void
     */
    public function getAnimaux(){
        $animaux = $this->apiManager->getDbAnimaux();
        Model::sendJson($this->formatAnimaux($animaux));

    }



    /**
     * Permet de recuperer d'envoyer la resource au router animaux avec les param famille et continent
     *
     * @return void
     */
    public function getAnimauxWithParam($idCont,$idFam){
        $animauxWithParam = $this->apiManager->getAnimauxDBWithParam($idCont,$idFam);
        Model::sendJson($this->formatAnimaux($animauxWithParam));

    }


    /**
     * Permet de recuperer d'envoyer la resource au router animaux par continent
     *
     * @return void
     */
    public function getAnimauxWithParamConti($idCont){
        $animauxWithParam = $this->apiManager->getAnimauxDbByContinent($idCont);
        Model::sendJson($this->formatAnimaux($animauxWithParam));

    }






    /**
     * Permet de recuperer d'envoyer la resource au router pour un animal
     *
     * @return response
     */
    public function getAnimal($id){


        $animal = $this->apiManager->getDbAnimal($id);
        Model::sendJson($this->formatAnimaux($animal));
    }


    /**
     * Permet de recuperer d'envoyer la resource au router  sur les continents
     *
     * @return void
     */
    public function getContinents(){

        $continent = $this->apiManager->getDbContinent();
        Model::sendJson($continent);
    }

    /**
     * Permet de recuperer d'envoyer la resource au router sur les familles
     *
     * @return json
     */
    public function getFamilles(){

        $famille = $this->apiManager->getDbFamille();
        Model::sendJson($famille);
    }
}