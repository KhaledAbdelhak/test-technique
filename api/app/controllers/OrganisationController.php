<?php


namespace app\controllers;

use app\models\Organisation;

class OrganisationController 
{
    public function list()
    {
        $organisationModel = new Organisation;
        $organisationList = $organisationModel->findAll(); 

        echo json_encode($organisationList);

    }

    public function item($params)
    {
        $organisationModel = new Organisation;
        $organisation = $organisationModel->findById($params["id"]);

        echo json_encode($organisation);

    }
}