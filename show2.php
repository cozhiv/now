<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
if (isset($_SESSION['whatever'])){
//if (isset($_SESSION['whatever'])){
//$_GET   = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
//$_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $title = test_input($_POST['title']);
    $time =  filter_var($_POST['time'], FILTER_SANITIZE_STRING);
    $date =  test_input($_POST['date']);
    //$tt = $_POST['time'];
    $word = cleanVar($title);
    $clock = $time.":00";
    $year = $date;
    $msql = "SELECT * FROM TimeMash WHERE ";
    if ($title!=""){
        $msql = $msql."highlights LIKE '%{$word}%' OR description LIKE '%{$word}%' GROUP BY startingAt;";
    //} else if ($time!=':'){
    //    $msql = $msql."startingAt >= '{$clock}' GROUP BY startingAt;";
    //} else if ($date!=''){
    //    $msql = $msql."startingOn >= '{$date}' GROUP BY startingOn;";
        } else if ($date!=''){
            $msql = $msql."startingOn >= '{$date}'AND startingAt >= '{$time}' GROUP BY startingOn;";
        } else {
            $msql = $msql."(highlights LIKE '%{$word}%' OR description LIKE '%{$word}%') AND "
            . "startingOn >= '{$date}'AND startingAt >= '{$time}' GROUP BY startingOn;";
        }
    /* SELECT * 
FROM TimeMash 
WHERE startingOn = CURRENT_DATE - INTERVAL 3 DAY */
    
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dbass";
//function userExists($nick, $pass, $servername, $username, $password, $dbname){
    
    $evMatch = FALSE;
    // Create connection
    $jdata = "";
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        echo "err in database" . $conn->connect_error;
        die("Connection failed: " . $conn->connect_error);
    }
  /* $stmt = $conn->prepare("SELECT * FROM TimeMash WHERE highlights LIKE ? GROUP BY id;");
   $stmt->bindParam('s', $title);
//$stmt->bindParam('add', $time);
//$stmt->bindParam('cit', $date);
    $stmt->execute();
    $eventSelection = $stmt->get_result();
*/
    //$msql = "SELECT * FROM TimeMash WHERE highlights LIKE '%{$word}%' OR description LIKE '%{$word}%' GROUP BY id;";
    
    
    $eventSelection = $conn->query($msql);
    $jdata = returnJson($eventSelection);
    
  //  } 
    $conn->close();
    echo $jdata;
    //echo $time."--";
    //echo $date."--";
    }
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
function cleanVar($var){
        $dirt = array(',','<','.','>','/','?',';',':','"','|','[',']','{','}','!','@','#','$','%','^','&','*','(',')','=');
        $clean = array('\,','\<','\.','\>','\/','\?','\;','\:','\"','\|','\[','\]','\{','\}','\!','\@','\#','\$','\%','\^','\&','\*','\(','\)','\=');
        $ret = str_replace($dirt, $clean, $var);
        return $ret;
    }
function returnJson($selection){
//    if ($eventSelection->num_rows > 0) {
        $jdata = '[';
        
        while($row = $selection->fetch_assoc()) {
                $jdata = $jdata. '{"id":"'.$row["id"].'" ,';
                $jdata = $jdata. '"img":"'.$row["firstLink"].'",';
                $jdata = $jdata. '"mainstream":"'.$row['mainstream'].'",';
                $jdata = $jdata. '"rank":"'.$row['additionalRanking'].'",';
                $jdata = $jdata. '"highlights":"'.$row['highlights'].'",';
                $jdata = $jdata. '"description":"'.$row['description'].'",';
                $jdata = $jdata. '"startingOn":"'.$row['startingOn'].'",';
                $jdata = $jdata. '"startingAt":"'.$row['startingAt'].'",';
                $jdata = $jdata. '"endingOn":"'.$row['endingOn'].'",';
                $jdata = $jdata. '"endingAt":"'.$row['endingAt'].'",';
                $jdata = $jdata. '"link2":"'.$row['secondLink'].'",';
                $jdata = $jdata. '"link3":"'.$row['thirdLink'].'",';
                $jdata = $jdata. '"link4":"'.$row['fourthLink'].'",';
                $jdata = $jdata. '"link5":"'.$row['fiftLink'].'",';
                $jdata = $jdata. '"link6":"'.$row['sixthLink'].'"';
                $jdata = $jdata. '},';
           
        }
        $jdata = substr($jdata, 0, -1);
        $jdata = $jdata. ']';
        return $jdata;
    }

