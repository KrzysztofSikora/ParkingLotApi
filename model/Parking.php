<?php


class Parking
{
    private $numberOfPlaces;


    public function __construct()
    {

        $conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT `id`, `places` FROM ParkingLotConfig";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
//                $this->numberOfPlaces-> $row['places'];
                $this->setNumberOfPlaces($row['places']);
            }
        }

        mysqli_close($conn);


    }


    public function updateNumberOfPlaces($numberOfPlaces)
    {

        if ($numberOfPlaces > $this->freePlaces()) {

            $conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "UPDATE ParkingLotConfig SET places = '$numberOfPlaces' WHERE id = 1";

            if ($conn->query($sql) === TRUE) {
                $status = "Config updated successfully. Place sets $numberOfPlaces";
            } else {
                $status = "Error updating record: " . $conn->error;
            }
            mysqli_close($conn);

        } else {
            $status = "You can not set a lower number of seats on the number of parked cars.";
        }


        return $status;

    }


    public function freePlaces()
    {

        $conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT count(id) FROM ParkingLot";

        $result = $conn->query($sql);
        $res = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($res, $row["count(id)"]);
            }
        }

        mysqli_close($conn);

        return $res[0];
    }

    public function listParkedCar()
    {
        $conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT `id`, `carId`, `type`, `wheels` FROM ParkingLot";

        $result = $conn->query($sql);
        $res = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($res, array("id" => $row['id'], 'carId' => $row['carId'], 'type' => $row['type'], 'wheels' => $row['wheels']));
            }
        } else {
            array_push($res, array("info" => "Parking lot is empty"));
        }

        mysqli_close($conn);

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

}