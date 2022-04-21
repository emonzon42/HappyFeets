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
    echo "Authentication Failed Refresh To Do It Again";
} else {
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
            <form>
                there will be stuff here soon

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