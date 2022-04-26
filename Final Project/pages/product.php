<!-- © 2022, Elijah C. Monzon Alvarenga. -->
<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Happy Feets | <?php $name ?></title>
        <link rel="shortcut icon" type="image/jpg" href="../img/Smileyy.png" />
        <link rel="icon" type="image/jpg" href="../img/Smileyy.png" />
        <meta name="description" content="<?php $itemdesc ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Elijah Alvarenga">
        <link rel="stylesheet" href="../css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    </head>

    <body>
        <div id="header"></div>
        <?php
        $errormsg = "<p class='error'>Page Not Found. :(</p>";
        if (empty($_GET['name']) || empty($_GET['color']) || empty($_GET['hash'])) { //the hash = id * 42 + (15^4)
            echo $errormsg;
        } else {
            if (is_numeric($_GET['hash'])) {
                require_once './login/connection.php';

                $id = ($_GET['hash'] - (15 ^ 4)) / 42;

                $query = "SELECT * FROM sneakers WHERE id=" . $id;
                $result = $conn->query($query);
                if (!$result) {
                    echo  "Error: " . $sql . "<br>" . $conn->error;
                    exit;
                }
                $row = mysqli_fetch_row($result);

                $name = $row[1];
                $alt = $row[2];
                $size = $row[3];
                $c1 = $row[4];
                $c2 = $row[5];
                $c3 = $row[6];
                $price = $row[7];
                $itemdesc = $row[8];
                $qty = $row[9];
                $img = $row[10];


                $conn->close();
            } else {
                echo $errormsg;
            }
        ?>

            <!-- Page Specific-->
            <div class="ibox"></div>

            <div class="box">

                <div class="left pinfo">
                    <?php
                    echo '<h1>' . $name . '</h1>';
                    echo '<h3>' . $alt . '</h3>';
                    echo '<p>$' . $price . '</p>';
                    echo '<p>Size: ' . $size . '</p>';
                    ?>

                    <button id="buy" class="bigbutton">Buy Now</button>
                </div>
                <div class="right">
                    <?php
                    echo '<img src="../img/products/' . $img . '" alt="' . $name . ' ' . $alt . '">;'
                    ?>
                </div>
                <p id="desc">
                    <?php
                    echo $itemdesc;
                    ?>
                </p>
            </div>
            <div class="ibox"></div>

        <?php
        }
        ?>
        <!-- Footer-->
        <div id="footer"></div>

        <script src="../js/loadheadfoot.js"></script>
    </body>

</html>