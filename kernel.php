<?php

include ("config.php");
include("Controller.php");

//
$controller = new Controller();


$data = json_decode( file_get_contents( 'php://input' ), true );
$method = addslashes($_GET['method']);
//var_dump($data);

// routing

switch ($method) {
    case 'add-vehicle':
        echo $controller->actionParkCar($data['vehicle'], $data['carId']);
        break;
    case 'remove':
        echo $controller->actionRemoveCar($data['carId']);
        break;
    case 'places':
        echo $controller->actionNumberOfPlacesCar();
        break;
    case 'list':
        echo $controller->actionListParkedCar();
        break;
    case 'config':
        echo $controller->actionConfigParkingLot($data['places']);
        break;
}
