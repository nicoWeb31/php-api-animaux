<?php
require_once "models/Model.php";

class ApiManager
{

    private $db;

    public function __construct()
    {
        $this->db = Model::getBdd();
    }

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


}