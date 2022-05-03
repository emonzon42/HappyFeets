<!-- © 2022, Elijah C. Monzon Alvarenga. -->
<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Happy Feets | <?php echo $_GET['name']; ?></title>
        <link rel="shortcut icon" type="image/jpg" href="../img/Smileyy.png" />
        <link rel="icon" type="image/jpg" href="../img/Smileyy.png" />
        <meta name="description" content="<?php echo $itemdesc; ?>"> <!--//!figure out how to get item desc to auto fill this-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Elijah Alvarenga">
        <link rel="stylesheet" href="../css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    </head>

    <body>
        <div id="header"></div>
        <?php
        include __DIR__.'/tools/hashslingingslasher.php'; //functions to hash/dehash data

        $errormsg = "<p class='error'>Page Not Found. :(</p>";
        if (empty($_GET['name']) || empty($_GET['color']) || empty($_GET['hash'])) { //the hash = id * 42 + (15^4)
            echo $errormsg;
        } else {
            if (is_numeric($_GET['hash'])) {
                require_once './login/connection.php';

                $id = dehash($_GET['hash']);

                $query = "SELECT ID,Name,AltName,Brand,cast(Size as decimal(10,1)),Color1,Color2,Color3,cast(Price as decimal(10,2)),ItemDesc,Qty,image1 
                FROM sneakers WHERE id=" . $id." AND name='".$_GET['name']."' AND color1='".$_GET['color']."'";
                $result = $conn->query($query);
                if (!$result) {
                    echo  "Error: " . $sql . "<br>" . $conn->error;
                    exit;
                }
                $row = mysqli_fetch_array($result);

                if(empty($row)){//user inputted a product into the url that doesn't exist
                    echo $errormsg. "It seems you have attempted to handwrite the URL or this page no longer exists. 
                    Please go ";
                    echo "<a href='/'>back</a>.";
                    exit;
                }

                $name = $row['Name'];
                $alt = $row['AltName'];
                $brand = $row['Brand'];
                $size = $row['cast(Size as decimal(10,1))'];
                $c1 = $row['Color1'];
                $c2 = $row['Color2'];
                $c3 = $row['Color3'];
                $price = $row['cast(Price as decimal(10,2))'];
                $itemdesc = $row['ItemDesc'];
                $qty = $row['Qty'];
                $img = $row['image1'];


                $conn->close();
        ?>

                <!-- Page Specific-->
                <div class="ibox"></div>

                <div class="box">

                    <div class="left">
                        <?php
                        echo '<img src="../img/products/' . $img . '" alt="' . $name . ' ' . $alt . '">';
                        ?>
                    </div>

                    <div class="right pinfo">
                        <?php
                        echo '<h2 class ="brandname">' . $brand . '</h2>';
                        echo '<h1>' . $name . '</h1>';
                        echo '<h3>' . $alt . '</h3>';
                        echo '' . $c1 . ' / ' . $c2 . ' / ' . $c3 . '';
                        echo '<p>$' . $price . '</p>';
                        echo '<p>Size: ' . $size . '</p>';
                        ?>

                        <button type="submit" name="submit" value="buy" id="buy" class="bigbutton">Add To Cart</button>
                        <div id="additemoutput"></div>
                    </div>

                    <p id="desc">
                        <?php
                        echo $itemdesc;
                        ?>
                    </p>
                </div>
                <div class="ibox"></div>

        <?php
            } else {
                echo $errormsg;
            }
        }
        ?>
        <!-- Footer-->
        <div id="footer"></div>
        <?php
        echo 
        "<script>
        $.getScript('../js/cartadd.js', function()
            {
                document.getElementById('buy').onclick = function() {
                    if (addtocart(".hasher($id).")){
                        $('#additemoutput').html('It has been added to the cart.');
                    } else{
                        $('#additemoutput').html('An error has occurred. Please try again later.');
                    }
                }
            });
        </script>";
        ?>
        <script src="../js/loadheadfoot.js"></script>
    </body>

</html>