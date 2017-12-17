<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        session_start();
        if (isset($_SESSION["whatever"])){
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "dbass";
            $parameter="";
            $value = "";
            if (isset($_POST["parameter"]) && !empty($_POST["parameter"]) && isset($_POST["value"]) && !empty($_POST["value"])){
                $key = $_POST["parameter"];
                $parameter =  filter_var($key, FILTER_SANITIZE_STRING);
                $val = $_POST["value"];
                $value =  filter_var($val, FILTER_SANITIZE_STRING);
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                } 

                // sql to delete a record
                $sql = "DELETE FROM TimeMash WHERE {$parameter}={$value}";

                if ($conn->query($sql) === TRUE) {
                    echo "Record with {$parameter} = {$value} deleted successfully";
                } else {
                    echo "Error deleting record: " . $conn->error;
            }

            $conn->close();

            }else {
                echo "specify the paremeters for deleting";
            }

        //} else {
        //echo "fuck off or log in!";
        //}
        }
}
?>

