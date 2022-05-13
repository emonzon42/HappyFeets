<!-- © 2022, Elijah C. Monzon Alvarenga. -->
<?php
require_once './login/connection.php';

$query = "SELECT * FROM sneakers ORDER BY DateAdded DESC;";
$result = $conn->query($query);
if (!$result) {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$homepagecover = '../img/homecover2.jpg'; //link to homepage cover photo
?>

<!doctype html>
<html lang="en">

    <head>
        <title>Happy Feets | Homepage</title>
        <meta name="description" content="Welcome to Happy Feets, where the customer's happiness is our number one priority! Please take your time as you browse through our selection of footwear and other accessories! ">
        <meta property="og:title" content="Happy Feets | Wearable Happiness" />
        <meta property="og:url" content="http://happyfeets.byethost9.com" />
        <meta property="og:description" content="Welcome to Happy Feets, where the customer's happiness is our number one priority! Please take your time as you browse through our selection of footwear and other accessories! " />
        <meta property="og:image" content="<?php echo $homepagecover; ?>" />
        <?php include __DIR__.'/pagedata.php'; // <head> data that is universal across website ?>

    </head>

    <body>
        <div id="header"></div>

        <!-- Page Specific-->
        <div id="homehead">

            <img src="<?php echo $homepagecover; ?>" max-width="2160px" max-height="1080px" alt="dummy image" id="homecov">
            <h1 class="cen">Happiness Is Where The Heart Is</h1>
            <a href="shop">Shop All</a>
        </div>
        <div class="ibox"></div>
        <div class="box">
            <h1 class="cen">At Happy Feets We Care About The Customer</h1>
            <p>Your Happiness Starts Here. Let us at Happy Feets take care of you and make sure your experience is a great one.
                From our top-notch customer service, to our quality products listed below market prices, there is nowhere else that
                you will be able to have an experience like this one.</p>
        </div>
        <div class="ibox"></div>
        <div class="box">
            <h1 class="cen">Just Came In!</h1>
            <?php
                    include __DIR__.'/tools/hashslingingslasher.php'; //functions to hash/dehash data
                    
                    $count = 0;
                    while($row = mysqli_fetch_array($result)){
                        
                        if(!$row['Qty']==0){//if we have run out of inventory it will not display
                            //echo json_encode($row);
                            $count++;
                            echo '
                            <div class="three-col">
                                <a href="./product.php?name='.$row['Name'].'&color='.$row['Color1'].'&hash='.hasher($row['ID']).'">
                                    <img src="../img/products/'.$row['image1'].'" alt="'.$row['Name'].'" width="300px" max-height="300px" max-width="300px">
                                    <p>'.$row['Brand'].' '.$row['Name'].'</p>
                                </a>
                            </div>
                            
                            ';
                        }
                        if($count == 3){ //only first 3 will display
                            break;
                        }
                    }
                    if($count !=3){ //if not enough/no products are available then show default dummy photos
                        for (; $count<3 ; $count++) { 
                            echo '
                            <div class="three-col">
                                <img src="https://via.placeholder.com/300" alt="dummy image" width="300px" max-height="300px" max-width="300px">
                                <p>Nothing to see here yet :(</p>
                            </div>
                            ';
                        }
                    }

                    $conn->close();

            ?>
        </div>
        <div class="ibox"></div>


        <!-- Footer-->
        <div id="footer"></div>

        <script src="../js/loadheadfoot.js"></script>
    </body>



</html>