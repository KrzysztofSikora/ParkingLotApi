<?php

include("config.php");
include("Controller.php");


$controller = new Controller();


$data = json_decode( file_get_contents( 'php://input' ), true );
$method = addslashes($_GET['method']);

// routing
if(isset($data["vehicle"])){
    if(!($data['vehicle'] == "bus" || $data['vehicle'] == "car" || $data['vehicle'] == "motorcycle")) {
        exit;
    }
}

switch ($method) {
    case 'add-vehicle':
        echo $controller->actionParkCar($data['vehicle'], intval($data['carId']));
        break;
    case 'remove':
        echo $controller->actionRemoveCar(intval($data['carId']));
        break;
    case 'places':
        echo $controller->actionNumberOfPlacesCar();
        break;
    case 'list':
        echo $controller->actionListParkedCar();
        break;
    case 'config':
        echo $controller->actionConfigParkingLot(intval($data['places']));
        break;
}

$controller->ofConnection();