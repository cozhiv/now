
        <?php
        $nnError = $psError = $matchError= "";
        $nickname = $pass = "";
        $match = TRUE;
        if (empty($_POST['nickname']) && !empty($_POST['pass'])){
              $nnError = "Please fill your nickname!";
        } else {
              $nickname = test_input($_POST['nickname']);     
        }
        if (empty($_POST['pass'])  && !empty($_POST['nickname'])){
            $psError = "Please fill your password!";
        }else{
            $pass = test_input($_POST['pass']);
        }
        if($nickname !== '' && $password!== ''){
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "dbass";
    


        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " .$conn->connect_error);
        }
        $sql = "SELECT nickname, password FROM flyingdutchman;";
        
        $users = $conn->query($sql);
        if($users->num_rows > 0){
            while ($row = $users->fetch_assoc()){
                 if (password_verify($pass, $row['password']) && $row['nickname']== $nickname){
                     $match = TRUE;
                     session_start();
                     $_SESSION['login'] = TRUE;
                     $_SESSION['name'] = $nickname;
                     $_SESSION['whatever'] = $nickname."ne6to+aiNO";
                     redirect('/eventruler.php');
                     break;

                 }
                 else {
                     $match = FALSE;
                 }
            
            }
            if ($match == FALSE){
                    $matchError = "Wrong username or password!";         
            } else {
                    $matchError = "";
            }
        }
        $conn->close();
        }
        function test_input($data) {
              $data = trim($data);
              $data = stripslashes($data);
              $data = htmlspecialchars($data);
              return $data;
        }
        function redirect($url) {
           ob_start();
           header('Location: '.$url);
           ob_end_flush();
           die();
        }
        ?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <style>
            input[type=text], select, textarea, input[type=password]{
                width: 100%;
                padding: 12px;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
                margin-top: 6px;
                margin-bottom: 16px;
                resize: vertical;
            }

            input[type=submit] {
                background-color: #4CAF93;
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }

            input[type=submit]:hover {
                background-color: #4CAF7D;
            }

            .container {
                width: 300px;
                border-radius: 5px;
                background-color: #f2f2f2;
                padding: 20px;
                margin: 0 auto 0 auto;
            }
            .errors{
                color:red;
            }
            @media screen and (max-width: 300px) {
                .container {
                    width: 100%;
                }
            }
        </style>
    </head>
    <body>
        <div class = "container">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method ="post">
                <label for = "nickname" id = "nickLabel">
                    Nick name: 
                </label>
                <input type="text" id="nickname" name = "nickname" placeholder="Your nickname: ">
                <span id = "nameError" class = "errors"><?php echo $nnError; ?></span>
                <label for="pass" id = "passLabel">
                    Password:
                </label>
                <input type ="password" id ="pass" name ="pass" placeholder="Your password: ">
                <span id="passError" class ="errors"><?php echo $psError; ?></span>                
                <p><a href="/neadmin.php">Sign up</a> if You don't have an account.</p>
                <input type = "submit">
            </form>
            <div id ="machError" class ="errors"><?php echo $matchError; ?></div>            
        </div>
    </body>
</html>

