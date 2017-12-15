<?php
//if (isset($_SESSION['whatever'])){
//$_GET   = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
$_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $type = strip_tags($_POST['q']);
        $q = filter_var($type, FILTER_SANITIZE_STRING);
        $key = strip_tags($_POST["parameter"]);
        $parameter =  filter_var($key, FILTER_SANITIZE_STRING);
        $val = strip_tags($_POST["value"]);
        $value =  filter_var($val, FILTER_SANITIZE_STRING);
   // echo $q;
    //$servername = "localhost";
   // $username = "root";
   // $password = "";
   // $dbname = "dbass";
//function userExists($nick, $pass, $servername, $username, $password, $dbname){
    
   // $evMatch = FALSE;
           // Create connection

   // $conne = new mysqli($servername, $username, $password, $dbname);
           // Check connection
   // if ($conne->connect_error) {
    //    echo "err in database" . $conne->connect_error;
    //    die("Connection failed: " . $conne->connect_error);
   // }

    $sign='';
    $len = strlen($parameter);
    $timeP = $yearP = $val = $param = "";
    switch($q){
        case 'w':
          $sign="{$parameter} LIKE '%{$value}%'";
          break;
        case 'b':
          $sign="{$parameter}  >= '{$value}'";  
          break;
        case 'at':
            $timeV = substr($value, -5);
            $yearV = substr($value, 0, -5);
            if ($len == 16){
                $yearP = "endingOn";
                $timeP= "endingAt";    
            } else {
                $yearP = "startingOn";
                $timeP= "startingAt";
            }
            $sign="{$yearP}  <= '{$yearV}' AND {$timeP} <= '{$timeV}'";
            break;
        case 'bt':
            $timeV = substr($value, -5);
            $yearV = substr($value, 0, -5);
            if ($len == 16){
                $yearP = "endingOn";
                $timeP= "endingAt";    
            } else {
                $yearP = "startingOn";
                $timeP= "startingAt";
            }
            $sign="{$yearP}  >= '{$yearV}' AND {$timeP} >= '{$timeV}'";
            break;
        case 'wbt':
            $timeV = substr($value, -5);
            $yearV = substr($value, -15, -5);
            $val = substr($value, 0, -15);
            if ($len == 26 || $len == 27){
                $yearP = "endingOn";
                $timeP= "endingAt";               
                $param = substr($parameter,0 -16);
            } else {
                $yearP = "startingOn";
                $timeP= "startingAt";
                $param = substr($parameter, 0, -20);
            }
            $sign="{$yearP}  >= '{$yearV}' AND {$timeP} >= '{$timeV}'";
            break;
        case 'wat':
            $timeV = substr($value, -5);
            $yearV = substr($value, -15, -5);
            $val = substr($value, 0, -15);
            if ($len == 26 || $len == 27){
                $yearP = "endingOn";
                $timeP= "endingAt";               
                $param = substr($parameter,0 -16);
            } else {
                $yearP = "startingOn";
                $timeP= "startingAt";
                $param = substr($parameter, 0, -20);
            }
            $sign="{$yearP}  <= '{.$yearV}' AND {$timeP} <= '{$timeV}' AND {$param} LIKE '%{$val}%'";
            break;
        case 'wa':
            if ($len == 18 || $len == 19){
                $timeP= substr($parameter, -8);               
                $param = substr($parameter,0, -8);
                $timeV = substr($value, -5);
                $val = substr($value,0, -5);
            } else {
                $timeP= substr($parameter, -10);               
                $param = substr($parameter,0, -10);
                $timeV = substr($value, -10);
                $val = substr($value, 0, -10);
            }
            $sign="{$param} LIKE '%{$val}%' AND {$timeP} <= '{$timeV}'";
            break;
        case 'wb':
            if ($len == 18 || $len == 19){
                $timeP= substr($parameter, -8);               
                $param = substr($parameter,0, -8);
                $timeV = substr($value, -5);
                $val = substr($value,0, -5);
            } else {
                $timeP= substr($parameter, -10);               
                $param = substr($parameter,0, -10);
                $timeV = substr($value, -10);
                $val = substr($value,0, -10);
            }
             $sign="{$param} LIKE '%{$val}%' AND {$timeP} >= '{$timeV}'"; 
             break;
        default:
            $sign="{$parameter} LIKE '{$value}'";
    }
    
    
    echo $q;
    echo "<br>param:<br>";
    echo $param;
    echo "<br>val:<br>";
    echo $val;
    echo "<br>timeP:<br>";
    echo $timeP;
   echo "<br>sign:<br>";
   echo $sign;


    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dbass";
//function userExists($nick, $pass, $servername, $username, $password, $dbname){

    $evMatch = FALSE;
    // Create connection

    $conne = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conne->connect_error) {
        echo "err in database" . $conne->connect_error;
        die("Connection failed: " . $conne->connect_error);
    }

    $msql = "SELECT id, startingOn, startingAt, endingOn, endingAt, highlights, description, "
                . "firstLink, secondLink, thirdLink, fourthLink, fiftLink, sixthLink, mainstream, additionalRanking) "
            . "FROM TimeMash WHERE {$sign};";
            
    echo "<br>msql command: {$msql}<br>";
    //$adminer = $conne->query($msql);
    $eventSelection = $conne->query($msql);
    echo "<br>query<br>";
     //$eeer = $eventSelection->num_rows;
     //echo $eeer;
     if ($eventSelection->num_rows > 0) {
        echo "<br>nun rows<br>";
        // output data of each row
        echo'<div class = "eventlist">';
        echo "<div class = 'idso'> метод на търсене: {$q} </div>";
        while($row = $eventSelection->fetch_assoc()) {
                $evMatch = TRUE;
                echo "kur<br>";
                echo "id: {$row['id']} популярост: {$row['mainstream']}, ранк: {$row['additionalRanking']}";
                echo "<div id = 'container{$row["id"]}' style='background-image:url(\"{$row["firstLink"]}\")'class='containers'>";
                echo "<div clas ='highlights'><h3> {$row['highlights']}</h3></div>";
                echo "<div class='times'>От: ${row['startingOn']} ${row['startingAt']} до: ${row['endingOn']} ${row['endingAt']}.</div>";
                echo "<div clas ='highlights'><p> {$row['description']}<p></div>";
                echo'</div>';
                echo '<div clas ="users columns passwords">';
                //echo 'hashed password'.$row[""];
                echo'</div>';
                echo "<button id ='change{$row["id"]}' class ='changebuttons'>Промени</button>";
                echo "<button id ='del{$row["id"]}' class ='deletebuttons'>Изтрий</button>";
                echo'<br>';
           
    }
    echo '</div>';
    } 
    $conne->close();
//}else{
//   redirect('/login.php');
//}

