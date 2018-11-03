<?php


class Motocycle extends Vehicle
{
    private $numberOfWheels = 2;
    private $model = "Motocycle";


    public function __construct($id)
    {
        $this->setCarId($id);
    }


    public function save()
    {
        // save to database

        $id = $this->getCarId();

        $sql = "INSERT INTO ParkingLot (`carId`, `type`, `wheels`) VALUES ($id,'" . $this->model . "', '" . $this->numberOfWheels . "')";

        return $this->fetch($sql);


    }
}