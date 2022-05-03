<!-- © 2022, Elijah C. Monzon Alvarenga. -->
<?php
$message="";
$error = false;
require_once './login/connection.php';
include __DIR__.'/tools/hashslingingslasher.php';

    $id = dehash($_COOKIE['cartitem']);
//    echo '<script>alert("'.$_COOKIE['cartitem'].'");</script>';
    $query = "SELECT ID,Name,AltName,Brand,cast(Size as decimal(10,1)),Color1,Color2,Color3,cast(Price as decimal(10,2)),ItemDesc,Qty,image1
    FROM sneakers WHERE id=" . $id . "";
    $result = $conn->query($query);
    if (!$result) {
        $message = "Error: " . $sql . "<br>" . $conn->error;
        $error = true;
        exit;
    }
    $row = mysqli_fetch_array($result);

    if (empty($row)) { //cookie doesn't exist
        $message="Your cart is currently empty.";
        $error = true;
    } else{
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

    }

    $conn->close();
                
?>

<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Happy Feets | Shopping Cart</title>
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
        <div class="box">
            <h1 class="cen">Shopping Cart</h1>
            <div class="box">
                <?php 

                if($error){
                    echo $message;
                } else{ //!i gotta make it so i can add multipke items to the cart
                    echo '                
                    <table class="cart">
                    <thead>
                        <tr>
                            <th>&nbsp</th> <th>Qty</th> <th>Total</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>
                                <img src="../img/products/' . $img . '" alt="' . $name . ' ' . $alt . '" max-width="100px" max-height="100px" width="100px" height="100px">
                                <div class="stack"><h3>'.$name.'</h3>Size: '.$size.'</div>
                            </td>       
                            <td>1</td>
                            <td>$'.$price.'</td>
                        </tr>
                    </tbody>
                </table>

                <button id="checkout" class="medbutton">Checkout</button>';
                }

                /* 
                
                        <tr>
                            <td>
                                <img src="https://via.placeholder.com/100" alt="dummy image">
                                <div class="stack"><h3>Product Name</h3>Size</div>
                            </td>       
                            <td>1</td> 
                            <td>$XX.XX</td>
                        </tr>
                */
                
                ?>

            </div>

        </div>
        <div class="ibox"></div>
    
    
        <!-- Footer-->
        <div id="footer"></div>
        
        <script src="../js/loadheadfoot.js"></script>
    </body>



</html>