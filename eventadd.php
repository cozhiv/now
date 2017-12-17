<?php 


session_start();
if (isset($_SESSION['whatever'])){
//echo "Hello {$_SESSION['name']}!";
$startingOnError = $startingHourError = $startingMinuteError = $endingOnError = $EndingHourError = $EndingMinuteError =  $EndingDescriptionError = $errorLink1 = $errorLink2 = $errorLink3 = $errorLink4 = $errorLink5 = $errorLink6 = '';
$startingOn = $endingOn = $highlights = $description = $link1 = $link2 = $link3 = $link4 = $link5 = $link6 ="";
$startingH = $startingM = $endingH = $endingM = $mainstream = $additionalRanking = 0; 


    if ($_SERVER["REQUEST_METHOD"] == "POST") {


        if (empty($_POST["startingOn"])) {
        $startingOnError = "must fill year!";
        } else {
           $startingOn =  test_input( $_POST["startingOn"]);
        }
        if (empty($_POST["startingH"])) {
            $startingHourError = " startin hour is mandatory!";
        } else {
           $startingH = test_input($_POST["startingH"]);
        }
        if (empty($_POST["startingM"])) {
            $startingMinuteError = "startin minute is mandatory!";
        } else {
           $startingM = test_input($_POST["startingM"]);
        }
        if (empty($_POST["endingOn"])) {
            $endingOnError = "must fill year!";
        } else {
           $endingOn = test_input( $_POST["endingOn"]);
        }
        if (empty($_POST["endingH"])) {
            $endingHourError = " ending hour is mandatory!";
        } else {
            $endingH = test_input($_POST["endingH"]);
        }
        if (empty($_POST["endingM"])) {
            $endingMinuteError = "ending minute is mandatory!";
        } else {
            $endingM = test_input($_POST["endingM"]);
        }


        if (empty($_POST["highlights"])) {
            $highlightsError = "highlights are mandatory! задължително";
        } else {
            $highlights = test_input($_POST["highlights"]);
        }

        if (empty($_POST["description"])) {
            $descriptionError = "description is mandatory!";
        } else {
            $description = test_input($_POST["description"]);
        }

        if (empty($_POST["mainstream"])) {
            $mainstream = 0;
        } else {
            $mainstream = test_input($_POST["mainstream"]);
        }
        if (empty($_POST["additionalRanking"])) {
            $additionalRanking = 0;
        } else {
            $additionalRanking = test_input($_POST["additionalRanking"]);
        }

        if (empty($_POST["link1"])) {
             $link1 = "";
        } else {
                $link1 = test_input($_POST["link1"]);
            // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $link1)) {
                $errorLink1 = "Invalid URL";
            }
        }  
        if (empty($_POST["link2"])) {
             $link2 = "";
        } else {
                $link2 = test_input($_POST["link2"]);
            // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $link2)) {
                $errorLink2 = "Invalid URL";
            }
        }
        if (empty($_POST["link3"])) {
             $link3 = "";
        } else {
                $link3 = test_input($_POST["link3"]);
            // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $link3)) {
                $errorLink3 = "Invalid URL";
            }
        }
        if (empty($_POST["link4"])) {
             $link4 = "";
        } else {
                $link4 = test_input($_POST["link4"]);
            // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $link4)) {
                $errorLink4 = "Invalid URL";
            }
        }
        if (empty($_POST["link5"])) {
             $link5 = "";
        } else {
                $link5 = test_input($_POST["link5"]);
            // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $link5)) {
                $errorLink5 = "Invalid URL";
            }
        }
        if (empty($_POST["link6"])) {
             $link6 = "";
        } else {
                $link6 = test_input($_POST["link6"]);
            // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $link6)) {
                $errorLink6 = "Invalid URL";
            }
        }
        if ($startingOn != '' && $endingOn!='' && $highlights!=''){
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "dbass";
            //if ($startingOn != '' && $endingOn!='' && $highlights!=''){


            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // sql to create table
            $sql = "INSERT INTO TimeMash (startingOn, startingAt, endingOn, endingAt, highlights, description,"
                   ."firstLink, secondLink, thirdLink, fourthLink, fiftLink, sixthLink, mainstream, additionalRanking)"
                   ."VALUES ('{$startingOn}','{$startingH}:{$startingM}','{$endingOn}','{$endingH}:{$endingM}','{$highlights}','{$description}',"
                   ."'{$link1}','{$link2}','{$link3}','{$link4}','{$link5}','{$link6}','{$mainstream}','{$additionalRanking}');";


            if ($conn->query($sql) === TRUE) {
                $last_id = $conn->insert_id;
                echo "<h2>ще се създаде събитие:</h2>";
                echo "начална дата: {$startingOn}" ;
                echo "<br>";
                echo "Начален час: {$startingH}:{$startingM}";
                echo "<br>";
                echo "крайна дата: {$endingOn}", $endingOnError;
                echo "<br>";
                echo "краен час: {$endingH}:{$endingM}";
                echo "<br>";
                echo $highlights;
                echo "<br>";
                echo $description;
                echo "<br>линк за снимка: ";
                echo "<img src = '{$link1}' style = 'width:40%'></img>", $errorLink1;
                echo "<br>";
                echo $link2, $errorLink2;
                echo "<br>";
                echo $link3, $errorLink3;
                echo "<br>";
                echo $link4, $errorLink4;
                echo "<br>";
                echo $link5, $errorLink5;
                echo "<br>";
                echo $link6, $errorLink6;
                echo "<br>";
            } else {
            echo "Error: {$sql} <br>  {$conn->error}";
            }

            $conn->close();
            
        }else {
            echo "<h2>няма да се създаде събитие поради една от следните причини:</h2>";
            echo "начална дата: {$startingOn}", $startingOnError ; 
            echo "<br>";
            echo "Начален час: {$startingH}:{$startingM}", $startingHourError," ", $startingMinuteError;
            echo "<br>";
            echo "крайна дата: {$endingOn}", $endingOnError;
            echo "<br>";
            echo "краен час: {$endingH}:{$endingM}", $EndingHourError," ", $EndingMinuteError;
            echo "<br>";
            echo $highlights;
            echo "<br>";
            echo $description;
            echo "<br>линк за снимка: ";
            echo $errorLink1;
            echo "<br>";
            echo $link2, $errorLink2;
            echo "<br>";
            echo $link3, $errorLink3;
            echo "<br>";
            echo $link4, $errorLink4;
            echo "<br>";
            echo $link5, $errorLink5;
            echo "<br>";
            echo $link6, $errorLink6;
            echo "<br>";
    
            //echo "higlights, starting date and ending date are mandatory!";
        }        
    }

//} else {
//redirect('/login.php');
} 
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
