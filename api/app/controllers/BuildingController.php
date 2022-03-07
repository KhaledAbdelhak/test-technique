<?php

namespace app\controllers;

use app\models\Building;

class BuildingController 
{
    public function list()
    {
        $buildingModel = new Building;
        $buildingList = $buildingModel->findAll(); 

        echo json_encode($buildingList);

    }

    public function item($params)
    {
        $buildingModel = new Building;
        $building = $buildingModel->findById($params["id"]);

        echo json_encode($building);

    }

    public function listByOrganisation($params) 
    {
        $buildingModel = new Building;
        $buildingList = $buildingModel->findAllByOrganisationId($params['id']);

        echo json_encode($buildingList);

    }
}