<!-- © 2022, Elijah C. Monzon Alvarenga. -->
<!doctype html>
<html lang="en">

    <head>
        <title>Happy Feets | Contact Us</title>
        <meta name="description" content="">
        <meta property="og:title" content="Happy Feets | Contact Us" />
        <meta property="og:url" content="http://happyfeets.byethost9.com/contact" />
        <meta property="og:description" content="description of your website/webpage" />
        <meta property="og:image" content="../img/homecover2.jpg" />
        <?php include __DIR__.'/pagedata.php'; // <head> data that is universal across website ?>
    </head>

    <body>
        <div id="header"></div>
    
        <!-- Page Specific-->
        <div class="ibox"></div>
        <div class="box"></div>
        <div class="box">
            <h1 class="cen">Contact Us</h1>
            <div id="confirm" class="center">Any questions or concerns? Feel free to use our contact form below and we will get in touch with you as soon as we can!</div>
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
                <button type="button" name="contactbtn" id="contactbtn">Submit</button>
    
            </form>

            <br>You can also reach us at <strong>averyhappycompany@gmail.com</strong>
        </div>
        <div class="box"></div>
        <div class="ibox"></div>
        <div id="footer"></div>

        <script src="../js/loadheadfoot.js"></script>
        <script src="../js/contact.js"></script>
    </body>



</html>