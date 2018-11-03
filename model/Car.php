<?php


class Car extends Vehicle
{

    private $numberOfWheels = 4;
    private $model = "Car";

    public function __construct($id)
    {

        $this->setCarId($id);

        // TODO: Implement __call() method.
    }

    public function save()
    {
        // save to database

        $id = $this->getCarId();

        $sql = "INSERT INTO ParkingLot (`carId`, `type`, `wheels`) VALUES ($id,'" . $this->model . "', '" . $this->numberOfWheels . "')";

        return $this->fetch($sql);


    }
}