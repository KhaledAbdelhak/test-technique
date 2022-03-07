<?php

namespace app\controllers;

use app\models\Room;

class RoomController 
{
    public function list()
    {
        $roomModel = new Room;
        $roomList = $roomModel->findAll(); 

        echo json_encode($roomList);

    }

    public function item($params)
    {
        $roomModel = new Room;
        $room = $roomModel->findById($params["id"]);

        echo json_encode($room);
    }

    public function listByBuilding($params) 
    {
        $roomModel = new Room;
        $roomList = $roomModel->findAllByBuildingId($params['id']);

        echo json_encode($roomList);

    }
}