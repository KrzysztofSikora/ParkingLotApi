<?php


class Parking
{
    private $numberOfPlaces;
    private $conn;



    public function __construct()
    {

        $this->conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT `id`, `places` FROM ParkingLotConfig";

        $result =  $this->conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $this->setNumberOfPlaces($row['places']);
            }
        }

    }


    public function updateNumberOfPlaces($numberOfPlaces)
    {

        if ($numberOfPlaces > $this->freePlaces()) {


            if (! $this->conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "UPDATE ParkingLotConfig SET places = '$numberOfPlaces' WHERE id = 1";

            if ( $this->conn->query($sql) === TRUE) {
                $status = "Config updated successfully. Place sets $numberOfPlaces";
            } else {
                $status = "Error updating record: " .  $this->conn->error;
            }

        } else {
            $status = "You can not set a lower number of seats on the number of parked cars.";
        }


        return $status;

    }


    public function freePlaces()
    {

        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT count(id) FROM ParkingLot";

        $result = $this->conn->query($sql);
        $res = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($res, $row["count(id)"]);
            }
        }

        return $res[0];
    }

    public function listParkedCar()
    {
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT `id`, `carId`, `type`, `wheels` FROM ParkingLot";

        $result = $this->conn->query($sql);
        $res = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($res, array("id" => $row['id'], 'carId' => $row['carId'], 'type' => $row['type'], 'wheels' => $row['wheels']));
            }
        } else {
            array_push($res, array("info" => "Parking lot is empty"));
        }


        return $res;
    }

    /**
     * @return int
     */
    public function getNumberOfPlaces()
    {
        return $this->numberOfPlaces;
    }

    /**
     * @param int $numberOfPlaces
     */
    public function setNumberOfPlaces($numberOfPlaces)
    {
        $this->numberOfPlaces = $numberOfPlaces;
    }
    public function ofConnection() {
        mysqli_close($this->conn);
    }
}