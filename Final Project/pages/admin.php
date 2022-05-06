<?php
include __DIR__.'/./secure/sunshine.php';

$authenticate = false;
if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])) {
    $name = $_SERVER['PHP_AUTH_USER'];
    $pass = $_SERVER['PHP_AUTH_PW'];
    if ($name == $theking && $pass == $vaultkey) {
        $authenticate = true;
    }
}

if ($authenticate == false) {
    header('WWW-Authenticate: Basic realm="Restricted Page Enter Details To Continue"');
    header('HTTP/1.0 401 Unauthorized');
    echo "YOU DO NOT HAVE ACCESS TO THIS PAGE >:)";
} else {

    $message = "Enter all the details below:";

    if (isset($_POST['adminsub'])) { // Has our form been submitted?

        if (
            empty($_POST['name']) || empty($_POST['alt']) || empty($_POST['size']) || empty($_POST['c1'])
            || empty($_POST['c2']) || empty($_POST['c3']) || empty($_POST['price']) || empty($_POST['itemdesc'])) {
            $message =json_encode($_POST); //"Please fill out everything.";
        
        } else {
            require_once './login/connection.php';
            include __DIR__.'/tools/cleanup.php'; //clean up tools for data

            //todo: data validation & prepared statements !(security measures)
            $name = validate($_POST['name']);
            $alt = validate($_POST['alt']);
            $brand = validate($_POST['brand']);
            $size = validate($_POST['size']);
            $c1 = validate($_POST['c1']);
            $c2 = validate($_POST['c2']);
            $c3 = validate($_POST['c3']);
            $price = validate($_POST['price']);
            $itemdesc = validate($_POST['itemdesc']);
            $qty = validate($_POST['qty']);
            $img1 = $_FILES['img1']['name'];

            $folder = __DIR__."/img/products/".$img1;
            
            $sql = "INSERT INTO sneakers 
                (Name, AltName,Brand, Size, Color1, Color2, Color3,Price,ItemDesc,Qty,image1) 
                VALUES 
                ('" . $name . "','" . $alt . "','" . $brand . "'," . $size . ",'" . $c1 . "','" . $c2 . "','" . $c3 . "'," . $price . ",'" . $itemdesc . "',
                " . $qty . ",'" . $img1 . "');
            "; //LOAD_FILE(submittedimg `)

            // Set our query results on the database to a variable
            $result = $conn->query($sql);

            // If the create table query we ran on the database is bad, let the user know.
            if (!$result) {
                $message =  "Error: " . $sql . "<br>" . $conn->error;
            } else if (move_uploaded_file($_FILES['img1']['tmp_name'],$folder)){
                $message = $name . " has been successfully uploaded";
            } else{
                $message = $name . " has been inserted, but the picture wasn't uploaded"; //should never happen if i did everything right
            }

            // Close connection - ALWAYS DO THIS
            $conn->close();
        }
    }
?>
    <html>

    <head>
        <title>Admin Portal</title>
        <meta name="description" content="">
        <?php include __DIR__.'/pagedata.php'; // <head> data that is universal across website ?>
    </head>

    <body>
        <div id="header"></div>

        <!-- Page Specific-->
        <div class="ibox"></div>
        <div class="box">
            <h1>Admin Portal</h1>
        </div>
        <div class="box"></div>
        <div class="box center">
            <h2 class="center">Add Products</h2>

            <p class="center"><?php
                echo $message;
            ?></p>
            <form action="" method="post" enctype="multipart/form-data">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" required><br>
                <label for="alt">alt Name:</label>
                <input type="text" name="alt" id="alt"><br>
                <label for="brand">Brand Name:</label>
                <input type="text" name="brand" id="brand"><br>
                <label for="size">size:</label>
                <input type="number" name="size" id="size" step="0.5" required><br>
                <label for="c1">Color1</label>
                <input type="text" name="c1" id="c1" required><br>
                <label for="c2">Color2</label>
                <input type="text" name="c2" id="c2"><br>
                <label for="c3">Color3</label>
                <input type="text" name="c3" id="c3"><br>
                <label for="price">price:</label>
                <input type="number" name="price" id="price" step="0.01" required><br>
                <label for="itemdesc">Item Desc:</label><br>
                <textarea name="itemdesc" id="itemdesc"></textarea><br>
                <label for="qty">quantity:</label>
                <input type="number" name="qty" id="qty" required><br>
                <label for="img1">image:</label>
                <input type="file" name="img1" id="img1" accept="image/png, image/jpeg" required><br>

                <button name="adminsub" id="submit" value="submit">Insert</button>

            </form>

        </div>
        <div class="box"></div>
        <div class="ibox"></div>
        <div id="footer"></div>

        <script src="../js/loadheadfoot.js"></script>
    </body>

    </html>
<?php
}
?>