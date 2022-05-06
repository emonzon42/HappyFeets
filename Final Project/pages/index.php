<!-- © 2022, Elijah C. Monzon Alvarenga. -->
<?php
require_once './login/connection.php';

$query = "SELECT * FROM sneakers;";
$result = $conn->query($query);
if (!$result) {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>

<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Happy Feets | Homepage</title>
        <link rel="shortcut icon" type="image/jpg" href="../img/Smileyy.png" />
        <link rel="icon" type="image/jpg" href="../img/Smileyy.png" />
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Elijah Alvarenga">
        <link rel="stylesheet" href="../css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    </head>

    <body>
        <div id="header"></div>

        <!-- Page Specific-->
        <div id="homehead">

            <img src="../img/homecover2.jpg" max-width="2160px" max-height="1080px" alt="dummy image" id="homecov">
            <h1 class="cen">Happiness Is Where The Heart Is</h1>
            <a href="shop">Shop All</a>
        </div>
        <div class="ibox"></div>
        <div class="box">
            <p>Your Happiness Starts Here. Let us at Happy Feets take care of you and make sure your experience is a great one.
                From our top-notch customer service, to our quality products listed below market prices, there is nowhere else that
                you will be able to have an experience like this one.</p>
        </div>
        <div class="ibox"></div>
        <div class="box">
            <h2 class="center">Newest Releases</h2>
            <div class="three-col">
                <img src="https://via.placeholder.com/300" alt="dummy image">
                <p>Product Name</p>
            </div>
            <div class="three-col">
                <img src="https://via.placeholder.com/300" alt="dummy image">
                <p>Product Name</p>
            </div>
            <div class="three-col">
                <img src="https://via.placeholder.com/300" alt="dummy image">
                <p>Product Name</p>
            </div>
        </div>
        <div class="ibox"></div>


        <!-- Footer-->
        <div id="footer"></div>

        <script src="../js/loadheadfoot.js"></script>
    </body>



</html>