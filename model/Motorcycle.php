<?php


class Motorcycle extends Vehicle
{
    private $numberOfWheels = 2;
    private $model = "Motorcycle";


    public function __construct($id)
    {
        parent::__construct();

        $this->setCarId($id);
    }


    public function save()
    {
        // save to database

        $id = $this->getCarId();

        $sql = "INSERT INTO ParkingLot (`carId`, `type`, `wheels`) VALUES ($id,'" . $this->model . "', '" . $this->numberOfWheels . "')";

        if($this->existChecker($id)) {
            return $this->fetch($sql);
        } else {
            $status = "Car with this carId is parked. You can't duplicated";
            return $status;
        }


    }
}