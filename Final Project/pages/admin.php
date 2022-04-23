<?php
include './secure/sunshine.php';

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

    $message = "yurrr";

    if (isset($_POST['adminsub'])) { // Has our form been submitted?

        if (
            empty($_POST['name']) || empty($_POST['alt']) || empty($_POST['size']) || empty($_POST['c1'])
            || empty($_POST['c2']) || empty($_POST['c3']) || empty($_POST['price']) || empty($_POST['itemdesc'])
            || empty($_POST['img1'])
        ) {
            $message = json_encode($_POST);
        } else {


            $message .=  "smdddddd";
            include './secure/manguconsalami.php';
            include '../tools/cleanup.php'; //clean up tools for data

            // Create new connection through mysqli using the four pieces of credentials
            $conn = new mysqli($dreamland, $kobe, $shaq, $db);

            // Check connection and quit if it doesn't work
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Use switch to see which button was submitted (same as if/else if/else)
            //todo: data validation & prepared statements !(security measures)
            $name = $_POST['name'];
            $alt = $_POST['alt'];
            $size = $_POST['size'];
            $c1 = $_POST['c1'];
            $c2 = $_POST['c2'];
            $c3 = $_POST['c3'];
            $price = $_POST['price'];
            $itemdesc = $_POST['itemdesc'];
            $qty = $_POST['qty'];
            $img1 = $_POST['img1'];


            $sql = "INSERT INTO sneakers 
                (Name, AltName, Size, Color1, Color2, Color3,Price,ItemDesc,Qty,imagelink1) 
                VALUES 
                ('" . $name . "','" . $alt . "'," . $size . ",'" . $c1 . "','" . $c2 . "','" . $c3 . "'," . $price . ",'" . $itemdesc . "',
                " . $qty . ", LOAD_FILE('" . $img1 . "'));
            "; //LOAD_FILE(submittedimg `)
            $message = $name . " has been successfully inserted";

            // Set our query results on the database to a variable
            $result = $conn->query($sql);

            // If the create table query we ran on the database is bad, let the user know.
            if (!$result) {
                $message =  "Error: " . $sql . "<br>" . $conn->error;
            }

            // Close connection - ALWAYS DO THIS
            $conn->close();
        }
    }
?>
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin Portal</title>
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
            <form action="" method="post">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" required><br>
                <label for="alt">alt Name:</label>
                <input type="text" name="alt" id="alt"><br>
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