<?php


class Vehicle
{
    private $carId = "";

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



    public function remove($carId) {
        // remove from database

        $conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "DELETE FROM ParkingLot WHERE carId = $carId";



        if (mysqli_query($conn, $sql)) {
            $status = "Car is removed";
        } else {
            $status = "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);


        return $status;

    }

    public function fetch($sql) {
        // fetch to database

        // Create connection
        $conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        if (mysqli_query($conn, $sql)) {
            $status = "New car parked successfully";
        } else {
            $status =  "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);

        return $status;

    }




}