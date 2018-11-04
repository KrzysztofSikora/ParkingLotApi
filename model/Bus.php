<?php


class Bus extends Vehicle
{
    private $numberOfWheels = 6;
    private $model = "Bus";


    public function __construct($carId)
    {
        parent::__construct();

        $this->setCarId($carId);

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