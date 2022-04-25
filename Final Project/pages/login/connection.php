<?php 
    include './secure/manguconsalami.php';

    // Create new connection through mysqli using the four pieces of credentials
    $conn = new mysqli($dreamland, $kobe, $shaq, $db);

    // Check connection and quit if it doesn't work
     if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>