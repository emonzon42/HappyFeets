<!-- © 2022, Elijah C. Monzon Alvarenga. -->
<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Happy Feets | Contact Us</title>
        <link rel="shortcut icon" type="image/jpg" href="../img/Smileyy.png"/>
        <link rel="icon" type="image/jpg" href="../img/Smileyy.png"/>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Elijah Alvarenga">
        <link rel="stylesheet" href="../css/style.css"> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    </head>

    <body>
        <div id="header"></div>
    
        <!-- Page Specific-->
        <div class="ibox"></div>
        <div class="box"></div>
        <div class="box"></div>
        <div class="box">
            <h1 class="cen">Contact Us</h1>
        </div>
    
        <div class="box center">
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
                <label for="fname">First Name:</label>
                <input type="text" id="fname" placeholder="Juan" name="first name" required><br>
                <label for="lname">Last Name:</label>
                <input type="text" id="lname" placeholder="Sanchez" name="last name" required><br>
                <label for="email">Email:</label>
                <input type="text" id="lname" placeholder="Sanchez" name="last name" required><br>
                <label for="msg">Message:</label><br>
                <textarea id="msg" placeholder="Enter Your Message"></textarea><br>
                <input type="submit" id="submit" value="Submit">
    
            </form>
    
        </div>
        <div class="box">
            <?php    
                // $view is false until we view our table with the "View Table" button
                // $message is empty until we have a message to output
                $view = false;
                $message = "";
            
                if($_SERVER['REQUEST_METHOD'] == "POST") { // Has our form been submitted?
                    
                    if(empty($_POST['fname']) || empty($_POST['lname']) || empty($_POST['email']) || empty($_POST['msg'])){
                        echo "Please provide any missing values.";
                    }else{
                        include './secure/manguconsalami.php';
                        include '../tools/cleanup.php'; //clean up tools for data
                        include '../tools/mail.php'; //to send emails

                        $first = test_input($_POST['fname']);
                        $last = test_input($_POST['lname']);
                        $mail = test_input($_POST['email']);
                        $msg = test_input($_POST['msg']);


                        //todo:add customer to db if they arent already there
                        /*
                        // Create new connection through mysqli using the four pieces of credentials
                        $conn = new mysqli($dreamland, $kobe, $shaq, $db);

                        // Check connection and quit if it doesn't work
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }*/
                        
                        //todo:send email
                        sendmail($first,$last,$mail,$msg); //sends email //!not fucntional yet :(


                        // Close connection - ALWAYS DO THIS
                        $conn->close();
                    }
                }
            ?>
        </div>
        <div class="box"></div>
        <div class="ibox"></div>
        <div id="footer"></div>

        <script src="../js/loadheadfoot.js"></script>
    </body>



</html>