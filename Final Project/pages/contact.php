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
                <input type="text" id="fname" placeholder="Juan" name="fname" required><br>
                <label for="lname">Last Name:</label>
                <input type="text" id="lname" placeholder="Sanchez" name="lname" required><br>
                <label for="email">Email:</label>
                <input type="text" id="email" placeholder="bigmoneyj@hotmail.com" name="email" required><br>
                <label for="msg">Message:</label><br>
                <textarea id="msg" name="msg" placeholder="Enter Your Message"></textarea><br>
                <input type="submit" id="submit" value="Submit">
    
            </form>
    
        </div>
        <div class="box">
            <div id="confirm"></div>
        </div>
        <div class="box"></div>
        <div class="box"></div>
        <div class="ibox"></div>
        <div id="footer"></div>

        <script src="../js/loadheadfoot.js"></script>
        <script src="../js/contact.js"></script>
    </body>



</html>