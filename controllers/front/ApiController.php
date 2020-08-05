<?php 

class ApiController 
{


    

    /**
     * Permet de recuperer d'envoyer la resource au router
     *
     * @return void
     */
    public function getAnimaux(){
        echo "animaux";
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