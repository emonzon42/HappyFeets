<!-- © 2022, Elijah C. Monzon Alvarenga. -->
<?php
    require_once './login/connection.php';

    $query = "SELECT * FROM sneakers";
    $result = $conn->query($query);
    if (!$result) {
        $message =  "Error: " . $sql . "<br>" . $conn->error;
    }
?>

<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Happy Feets | Shop All</title>
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
        <div class="box">
            <h1>Shop All</h1>
        </div>
    
        <div class="box">
            <p>All available products</p>
        </div>
    
        <div class="box">
            <ul id="products">
                <?php
                    include __DIR__.'/tools/hashslingingslasher.php'; //functions to hash/dehash data

                    while($row = mysqli_fetch_array($result)){
                        if(!$row['Qty']==0){//if we have run out of inventory it will not display
                            //echo json_encode($row);
                            echo '<li class="item">';
                                echo '<a href="./product.php?name='.$row['Name'].'&color='.$row['Color1'].'&hash='.hasher($row['ID']).'">';
                                    echo '<img src="../img/products/'.$row['image1'].'" alt="'.$row['Name'].'" width="200px" height="200px">';
                                    echo '<p>'.$row['Name'].'</p>';
                                    echo "$".$row['Price'];
                                echo '</a>';
                            echo '</li>';
                        }
                    }   

                    $conn->close();


                    /* 
                                    
                    <li class="item">
                        <a href="#">
                            <img src="https://via.placeholder.com/200" alt="dummy image">
                            <p>Product Name</p>
                            $XX.XX
                        </a>
                    </li>
                    
                    */
                ?>
            </ul>
        </div>
    
        <!-- Footer-->
    
        <div id="footer"></div>

        <script src="../js/loadheadfoot.js"></script>
    </body>



</html>