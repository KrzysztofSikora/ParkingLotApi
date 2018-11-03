<?php


class Bus extends Vehicle
{
    private $numberOfWheels = 6;
    private $model = "Bus";


    public function __construct($carId)
    {
        $this->setCarId($carId);

    }

    public function save()
    {
        // save to database
        $id = $this->getCarId();
        // Create connection
        $sql = "INSERT INTO ParkingLot (`carId`, `type`, `wheels`) VALUES ($id,'" . $this->model . "', '" . $this->numberOfWheels . "')";
        return $this->fetch($sql);

    }
}