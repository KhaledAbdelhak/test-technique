<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
header('Content-Type: application/json');

use app\utils\Database;

require_once __DIR__ . '/vendor/autoload.php';



$router = new AltoRouter();

//Building
$router->map("GET", "/buildings", ["controller" => "\\app\\controllers\\BuildingController", "method" => "list"], "building-list");
$router->map("GET", "/buildings/organisation/[i:id]", ["controller" => "\\app\\controllers\\BuildingController", "method" => "listByOrganisation"], "building-listByOrganisation");
$router->map("GET", "/buildings/[i:id]", ["controller" => "\\app\\controllers\\BuildingController", "method" => "item"], "building-item");


//Organisation
$router->map("GET", "/organisations", ["controller" => "\\app\\controllers\\OrganisationController", "method" => "list"], "organisation-list");
$router->map("GET", "/organisations/[i:id]", ["controller" => "\\app\\controllers\\OrganisationController", "method" => "item"], "organisation-item");

//room
$router->map("GET", "/rooms", ["controller" => "\\app\\controllers\\RoomController", "method" => "list"], "room-list");
$router->map("GET", "/rooms/[i:id]", ["controller" => "\\app\\controllers\\RoomController", "method" => "item"], "room-item");
$router->map("GET", "/rooms/building/[i:id]", ["controller" => "\\app\\controllers\\RoomController", "method" => "listByBuilding"], "room-listByBuilding");



$routeInfo = $router->match();



if ($routeInfo === false)
{
    http_response_code(404);
    exit("404 not found");
}

$dispatchInfo = $routeInfo['target'];



$controllerName = $dispatchInfo['controller'];

$methodName = $dispatchInfo['method'];

$controller = new $controllerName();
$controller->$methodName($routeInfo['params']);

