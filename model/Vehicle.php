<?php


class Vehicle
{
    private $carId = "";
    public $conn;




    public function __construct()
    {
        $this->conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);
    }


    public function remove($carId) {


        // Check connection
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "DELETE FROM ParkingLot WHERE carId = $carId";

        if (mysqli_query($this->conn, $sql)) {
            $status = "Car is removed";
        } else {
            $status = "Error: " . $sql . "<br>" . mysqli_error($this->conn);
        }



        return $status;

    }


    public function existChecker($carId) {


        if (!$this->conn) {
            die("existChecker Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT id FROM ParkingLot WHERE carId = $carId";



        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                return false;

            }
        }

        return true;
    }

    public function fetch($sql) {
        // fetch to database

        // Check connection
        if (!$this->conn) {
            die("fetch Connection failed: " . mysqli_connect_error());
        }

        if (mysqli_query($this->conn, $sql)) {
            $status = "New car parked successfully";
        } else {
            $status =  "Error: " . $sql . "<br>" . mysqli_error($this->conn);
        }


        return $status;

    }

    /**
     * @return string
     */
    public function getCarId()
    {
        return $this->carId;
    }

    /**
     * @param string $carId
     */
    public function setCarId($carId)
    {
        $this->carId = $carId;
    }


    public function ofConnection() {
        mysqli_close($this->conn);
    }


}