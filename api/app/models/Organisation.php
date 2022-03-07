<?php 


namespace app\models;

use app\utils\Database;
use PDO;


class Organisation {

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

        $sql = "SELECT organisation.*, SUM(room.people_inside) as people_inside from organisation INNER JOIN building ON organisation.id = building.organisation_id  INNER JOIN room ON building.id = room.building_id GROUP by organisation.id ";
    
    
        $statement = $pdo->query($sql);
    
        $organisationObject = $statement->fetchAll(PDO::FETCH_CLASS, self::class);
    
        return $organisationObject;
    }

    public function findById($id)
    {

        $pdo = Database::getPDO();

        $sql = "SELECT * FROM `organisation` WHERE `id` = " . $id;


        $statement = $pdo->query($sql);

        $organisationObject = $statement->fetchObject(self::class);


        return $organisationObject;
    }
}