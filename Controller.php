<?php


include("model/Vehicle.php");
include("model/Bus.php");
include("model/Car.php");
include("model/Parking.php");
include("model/Motorcycle.php");

class Controller
{

    private $lot;
    private $parkingLot;

    public function __construct()
    {
        $this->parkingLot = new Parking();
        $this->lot = $this->parkingLot->getNumberOfPlaces() - $this->parkingLot->freePlaces();
    }

    public function actionParkCar($type, $id)
    {


        if ($this->lot > 0) {

            //add vehicle
            switch ($type) {
                case 'bus':
                    $bus = new Bus($id);
                    $info = $bus->save();
                    break;
                case 'Motorcycle':
                    $motorcycle = new Motorcycle($id);
                    $info = $motorcycle->save();
                    break;
                case 'car':
                    $car = new Car($id);
                    $info = $car->save();
                    break;
            }
        } else {
            $info = "Have not free places";
        }
        $info = Array("info" => $info);


        return json_encode($info);


    }

    public function actionRemoveCar($carId)
    {

        $vehicle = new Vehicle();
        $status = $vehicle->remove($carId);

        $info = Array("info" => $status);

        return json_encode($info);

    }

    public function actionNumberOfPlacesCar()
    {
        // how free places is
        $lot = Array("places" => $this->parkingLot->getNumberOfPlaces() - $this->parkingLot->freePlaces());

        return json_encode($lot);

    }

    public function actionListParkedCar()
    {

        $list = $this->parkingLot->listParkedCar();

        return json_encode($list);

    }
    public function actionConfigParkingLot($places)
    {

        $status = Array("info", $this->parkingLot->updateNumberOfPlaces($places));

        return json_encode($status);

    }
}