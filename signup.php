<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Sign Up</title>
        <style>
            /* Full-width input fields */
            input[type=text], input[type=password] {
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                box-sizing: border-box;
            }

            /* Set a style for all buttons */
            button {
                background-color: #4CAF50;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                cursor: pointer;
                width: 100%;
            }

            /* Extra styles for the cancel button */
            .cancelbtn {
                padding: 14px 20px;
                background-color: #f44336;
            }

            /* Float cancel and signup buttons and add an equal width */
            .cancelbtn,.signupbtn {
                float: left;
                width: 50%;
            }

            /* Add padding to container elements */
            .container {
                padding: 16px;
            }

            /* Clear floats */
            .clearfix::after {
                content: "";
                clear: both;
                display: table;
            }

            /* Change styles for cancel button and signup button on extra small screens */
            @media screen and (max-width: 300px) {
                .cancelbtn, .signupbtn {
                   width: 100%;
                }
            }
            </style>
    </head>
    <body>
        <?php
        $nname = $passit = $passit2 = $anders = '';
        $matchErr = $nnameErr = $passitErr = $matchErr = $andersErr = '';
      
        //$panders = $_POST["anders"];
        //$nname = $_POST["nname"];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["nname"])) {
    $nnameErr = "Name is required";
  } else {
    $nname = test_input($_POST["nname"]);
  }

  if (empty($_POST["passit"])) {
    $passitErr = "Password is required";
  } 
  elseif ($_POST["passit"] !== $_POST["passit2"]){
      $matchErr = "Passwords doesn't match!";
  }else {
    $passit = test_input($_POST["passit"]);
  }
if (empty($_POST["anders"])) {
    $anders = "";
    $andersErr ="e-mail is mandatory! ";
  } else {
    $anders = test_input($_POST["anders"]);
  }
}
if ($anders =='' && $passit=='' && $nname ==''){
    $nnameErr = $passitErr = $andersErr = '';
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<div class="container">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="nname">Name: </label>
        <input type="text" name="nname" id="nname" placeholder="Your name or nickname: " required>
        <span class="error">* <?php echo $nnameErr;?></span>
        <br><br>

        <label for="passit">Password: </label>
        <input type="text" id="passit" name="passit" placeholder="Your password: " required>
        <span class="error">* <?php echo $passitErr;?></span>

        <br><br>
        <label for="passit2">Password: </label>
        <input type="text" id="passit2" name="passit2" placeholder="Password confirmation: " required>
        <span class="error">* <?php echo $matchErr;?></span>
        <br><br>

        <label for="email">Email: </label>
        <input type="text" id = "email" name="anders" placeholder="Your e-mail: " required>
        <span class="error"><?php echo $andersErr;?></span>
        <br><br>
        <p><input type="checkbox" checked="checked"> By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
        <div class="clearfix">
            <button type="button" class="cancelbtn">Cancel</button>
            <button type="submit" class="signupbtn">Sign Up</button>
        </div> 
    </form>
</div>

<?php 

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "dbass";

  // Create connection
  if ( $passit !== '' && $nname !== '' ){
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    $passit = password_hash($passit, PASSWORD_BCRYPT);
    $sql = "INSERT INTO flyingdutchman(nickname, password, email) VALUES ('".$nname."', '".$passit."', '".$anders."');";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='message'>New record created successfully: ".$nname."', '".$passit."', '".$anders."'!</div>";
    } else {
        echo "<div class='message'>Error: $sql</div> <br> <div class='message'>$conn->error</div>";
    }

    $conn->close();
   } else {
    echo "<div class='message'>no pass and/or uname!</div>";
   }
?>
    </body>
</html>

