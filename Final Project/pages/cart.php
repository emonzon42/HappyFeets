<!-- © 2022, Elijah C. Monzon Alvarenga. -->
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
                <table class="cart">
                    <thead>
                        <tr>
                            <th>&nbsp</th> <th>Qty</th> <th>Total</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>
                                <img src="https://via.placeholder.com/100" alt="dummy image">
                                <div class="stack"><h3>Product Name</h3><p>Size</p></div>
                            </td>       
                            <td>1</td> 
                            <td>$XX.XX</td>
                        </tr>

                        <tr>
                            <td>
                                <img src="https://via.placeholder.com/100" alt="dummy image">
                                <div class="stack"><h3>Product Name</h3><p>Size</p></div>
                            </td>       
                            <td>1</td> 
                            <td>$XX.XX</td>
                        </tr>
                    </tbody>

                </table>

                <button id="checkout" class="medbutton">Checkout</button>
            </div>

        </div>
        <div class="ibox"></div>
    
    
        <!-- Footer-->
        <div id="footer"></div>
        
        <script src="../js/loadheadfoot.js"></script>
    </body>



</html>