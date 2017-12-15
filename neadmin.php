<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
        <title>Sign Up</title>
        <style>
            .error{
                color:#D03;
            }
            .container {
                width: 300px;
                border-radius: 5px;
                background-color: #f2f2f2;
                padding: 20px;
                margin: 0 auto 0 auto;
            }
            /* Full-width input fields */
            input[type=text], input[type=password], input[type=email], select, textarea{
                width: 100%;
                font-size: 15pt;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                box-sizing: border-box;
            }

            /* Set a style for all buttons */
            button {
                background-color: #4CAF93;
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
                /*float: left;*/
                width: 50%;          
            
            .success{
                color:green;
            }
            .match{
                border: 1px solid #4CAF93;
            }
            .nomatch{
                border: 1px solid #D03;
            }
            

            /* Clear floats */
            .clearfix::after {
                content: "";
                clear: both;
                display: table;
            }
            .terms{
                display: inline;
            }
            /* Change styles for cancel button and signup button on extra small screens 
            @media screen and (max-width: 300px) {
                .container {
                    width: 100%;
                }
                .cancelbtn, .signupbtn {
                   width: 100%;
                }
            }

            */
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
    $nnameErr = "Name is required<br/>";
  } else {
    $nname = test_input($_POST["nname"]);
  }

  if (empty($_POST["passit"])) {
    $passitErr = "Password is required<br/>";
  } 
  elseif ($_POST["passit"] !== $_POST["passit2"]){
      $matchErr = "Passwords doesn't match!<br/>";
  }else {
    $passit = test_input($_POST["passit"]);
  }
if (empty($_POST["anders"])) {
    $anders = "";
    $andersErr ="e-mail is mandatory!<br/> ";
  } else {
    $anders = test_input($_POST["anders"]);
  }
}
if (empty($_POST["passit"]) && empty($_POST["nname"]) && empty($_POST["anders"])){
    $nnameErr = $passitErr = $andersErr = $matchErr = '';
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
        <span class="error"> <?php echo $nnameErr;?></span>
        <label for="passit">Password: </label>
        <input type="password" id="passit" name="passit" placeholder="Your password: " required>
        <span class="error"> <?php echo $passitErr;?></span>
        <label for="passit2">Password: </label>
        <input type="password" id="passit2" name="passit2" placeholder="Password confirmation: " required>
        <span class="error"> <?php echo $matchErr;?></span>
        <label for="email">Email: </label>
        <input type="email" id = "email" name="anders" placeholder="Your e-mail: " required>
        <span class="error"> <?php echo $andersErr;?></span>
        <p><input type="checkbox" checked="checked" class="terms" id="terms"> By creating an account you agree to our <a href="#">Terms & Privacy </a>.</p>
        <p> If You already have an account You can always sign in <a href="/login.php">here</a>.</p>
        <div class="clearfix">
            <!--button type="button" class="cancelbtn">Cancel</button-->
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
  if ( $passit !== '' && $nname !== '' && $anders !== ''){
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    $passit = password_hash($passit, PASSWORD_BCRYPT);
    $sql = "INSERT INTO flyingdutchman(nickname, password, email) VALUES ('".$nname."', '".$passit."', '".$anders."');";

    if ($conn->query($sql) === TRUE) {
        echo "<br><div class='success message'>New record created successfully: ".$nname."', '".$passit."', '".$anders."'!</div>";
    } else {
        echo "<br><div class='errors message'>Error: $sql</div> <br> <div class='message'>$conn->error</div>";
    }

    $conn->close();
   } else {
    //echo "<div class='message'>no pass and/or uname!</div>";
   }
?>
        <script>
            $(document).ready(function(){
                var nname = $('#nname');
                var passit = $('#passit');
                var passit2= $("#passit2");
                var email = $("#email");
                function addMatch(inp){
                    $(inp).removeClass("nomatch");
                    $(inp).addClass("match");
                    
                }
                function removeMatch(inp){
                    $(inp).removeClass("match");
                    $(inp).addClass("nomatch");
                }
                passit2.on('keyup', function(){
                    var pass1Text = $(passit).val();
                    var pass2Text = $(passit2).val();
                    var inp = $("input[type=password]");
                    if (pass1Text === pass2Text){
                        $(inp).css('border-width', '0');
                        $(inp).css("border","1px solid #4CAF93");
                    } else {
                        $(inp).css('border-width', '0');
                        $(inp).css("border","1px solid #D03");
                    }
                    
                });
                passit1.on('keyup', function(){
                    var pass1Text = $(passit).val();
                    var pass2Text = $(passit2).val();
                    var inp = $("input[type=password]");
                    if (pass1Text === pass2Text && pass2Text!==''){
                        $(inp).css('border-width', '0');
                        $(inp).css("border","1px solid #4CAF93");
                    } else {
                        $(inp).css('border-width', '0');
                        $(inp).css("border","1px solid #D03");
                    }
                    
                });
                nname.on('keyup', function(){
                    var name = $(nname).val();
                    var inp = $(nname);
                    if (name.length < 3){
                        $(inp).css('border-width', '0');
                        $(inp).css("border","1px solid #4CAF93");
                    } else if (name !== ''){
                        $(inp).css('border-width', '0');
                        $(inp).css("border","1px solid #D03");
                    }
                    
                });
            });
        </script>
    </body>
</html>

