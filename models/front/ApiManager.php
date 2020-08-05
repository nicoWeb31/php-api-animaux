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

        $req = "SELECT * FROM animal";
        $stmt = $this->db->prepare($req);

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


}