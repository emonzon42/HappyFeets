<!-- © 2022, Elijah C. Monzon Alvarenga. -->
<?php
    require_once './login/connection.php';

    $query = "SELECT ID,Name,AltName,Brand,cast(Size as decimal(10,1)),Color1,Color2,Color3,cast(Price as decimal(10,2)),ItemDesc,Qty,image1 FROM sneakers;";
    $result = $conn->query($query);
    if (!$result) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    } 
?>

<!doctype html>
<html lang="en">

    <head>
        <title>Happy Feets | Shop All</title>
        <meta name="description" content="">
        <?php include __DIR__.'/pagedata.php'; // <head> data that is universal across website ?>
    </head>

    <body>
        <div id="header"></div>
    
        <!-- Page Specific-->
        <div class="box">
            <h1>Shop All</h1>
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
                                    echo "$".$row['cast(Price as decimal(10,2))'];
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