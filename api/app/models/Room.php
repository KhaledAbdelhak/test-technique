<?php 

namespace app\models;

use app\utils\Database;
use PDO;


class Room {

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

        $sql = "SELECT room.*, building.name AS building_name FROM `room` INNER JOIN building ON room.building_id = building.id ";
    
    
        $statement = $pdo->query($sql);
    
        $roomObject = $statement->fetchAll(PDO::FETCH_CLASS, self::class);
    
        return $roomObject;
    }

    public function findById($id)
    {

        $pdo = Database::getPDO();

        $sql = "SELECT * FROM `room` WHERE `id` = " . $id;


        $statement = $pdo->query($sql);

        $roomObject = $statement->fetchObject(self::class);


        return $roomObject;
    }

    public function findAllByBuildingId($buildingId) 
    {

        $pdo = Database::getPDO();

        $sql = "SELECT  room.id, room.name, room.people_inside, room.building_id 
                FROM `room` INNER JOIN `building` ON building.id = room.building_id 
                WHERE room.building_id =" . $buildingId ;

        $statement = $pdo->query($sql);

        $roomObject = $statement->fetchAll(PDO::FETCH_CLASS, self::class);

        return $roomObject;
    }
}