<?php 


namespace app\models;

use app\utils\Database;
use PDO;



class Building {

    public $id;
    public $name;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->$name = $name;
        return $this;
    }

    public function findAll() {

        $pdo = Database::getPDO();

        $sql = "SELECT  building.*,  organisation.name AS organisation_name, SUM(room.people_inside) AS people_inside FROM building INNER JOIN organisation ON building.organisation_id = organisation.id INNER JOIN room ON building.id = room.building_id GROUP BY building.id";
    
    
        $statement = $pdo->query($sql);
    
        $buildingObject = $statement->fetchAll(PDO::FETCH_CLASS, self::class);
    
        return $buildingObject;
    }

    public function findById($id)
    {
        $pdo = Database::getPDO();

        $sql = "SELECT  building.id, building.name, SUM(room.people_inside) AS peoples_inside , room.building_id 
        FROM `room` INNER JOIN `building` ON building.id = room.building_id WHERE building.id = ". $id ;
    
        $statement = $pdo->query($sql);
    
        $productObject = $statement->fetchObject(self::class);
    
        return $productObject;
    }

    public function findAllByOrganisationId($organisationId) 
    {

        $pdo = Database::getPDO();

        $sql = "SELECT building.*, SUM(room.people_inside) as people_inside from building INNER JOIN room ON building.id = room.building_id WHERE building.organisation_id = $organisationId GROUP by building.id " ;

        $statement = $pdo->query($sql);

        $buildingObject = $statement->fetchAll(PDO::FETCH_CLASS, self::class);

        return $buildingObject;
    }
}