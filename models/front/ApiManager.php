<?php
require_once "models/Model.php";

class ApiManager
{

    private $db;

    public function __construct()
    {
        $this->db = Model::getBdd();
    }

    /**
     * fetch information amimaux in db
     *
     * @return array
     */
    public function getDbAnimaux(){

        $req = "SELECT * 
        FROM animal a inner join famille f
        on f.famille_id = a.famille_id
        inner join animal_continent ac on ac.animal_id = a.animal_id
        inner join continent c on c.continent = ac.continent";

        $stmt = $this->db->prepare($req);

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    /**
     * fetch information amimal in db, woth $id
     * @return  array
     */
    public function getDbAnimal($id){

        $req = "SELECT * 
        FROM animal a inner join famille f
        on f.famille_id = a.famille_id
        inner join animal_continent ac on ac.animal_id = a.animal_id
        inner join continent c on c.continent = ac.continent
        where a.animal_id = :id
        ";

        $stmt = $this->db->prepare($req);


        //bindvalue
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



    /**
     * fetch information famille in db, woth $id
     * @return  array
     */
    public function getDbFamille(){

        $req = "SELECT * from famille";

        $stmt = $this->db->prepare($req);

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    /**
     * fetch information continent in db, woth $id
     * @return  array
     */
    public function getDbContinent(){

        $req = "SELECT * from continent";

        $stmt = $this->db->prepare($req);

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}