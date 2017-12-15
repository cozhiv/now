<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbass";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "SELECT id, startingOn, startingAt, endingOn, endingAt, highlights, description,firstLink, secondLink, thirdLink, fourthLink, fiftLink, sixthLink, mainstream, additionalRanking FROM TimeMash";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
 while($row = $result->fetch_assoc()) {
        echo "<div class = 'events today ".$row["startingOn"]."'>";
        echo "";
        echo "<h2>това е събитие:</h2>";
        echo "id: " . $row["id"]. "<br>  <p>Today: " . $row["startingOn"]. " starting at: " . $row["startingAt"]. "<br>"
              ."which is ending on:  " . $row["endingOn"]. " and doors are closing at: ". $row["endingAt"] . "<br><b> " . $row["highlights"]. "</b><br>"
              ."<div class='descriptions'><i> " . $row["description"]. "</i></div> <br><div class='backgrounds'><img src='". $row["firstLink"]."' class='images' style = 'width:40%; max-width:600px;'></img></div> <br> link2: " . $row["secondLink"]. "<br>"
              ."link3: " . $row["thirdLink"]. " - link4: " . $row["fourthLink"]. "link5: " . $row["fiftLink"]. "<br>"
              ."link6: " . $row["sixthLink"]. " <br> mainstream: " . $row["mainstream"]. "additional ranking: " . $row["additionalRanking"]. "<br>";
        echo "==============================================================";
        echo "</div>";
        }
} else {
    echo "0 results";
}
$conn->close();

        ?>
    </body>
</html>





