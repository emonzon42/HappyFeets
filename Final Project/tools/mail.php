<?php


if ($_SERVER['REQUEST_METHOD'] == "POST") { // Has the form been submitted?

    if (empty($_POST['fname']) || empty($_POST['lname']) || empty($_POST['email']) || empty($_POST['msg'])) {
        echo "Please provide any missing values.";
        echo $_POST['fname'];
        echo $_POST['lname'];
        echo $_POST['email'];
        echo $_POST['msg'];
    } else {
    //    include './secure/manguconsalami.php';
        include './cleanup.php'; //clean up tools for data

        $first = test_input($_POST['fname']);
        $last = test_input($_POST['lname']);
        $mail = test_input($_POST['email']);
        $msg = test_input($_POST['msg']);


        //todo:add customer to db if they arent already there
        /*
                        // Create new connection through mysqli using the four pieces of credentials
                        $conn = new mysqli($dreamland, $kobe, $shaq, $db);

                        // Check connection and quit if it doesn't work
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }*/

        //todo:send email
        sendmail($first, $last, $mail, $msg); //sends email //!not fucntional yet :(
        echo "Great! We will be in touch with you soon!";

        // Close connection - ALWAYS DO THIS
       // $conn->close();
    }
}

function sendmail($first, $last, $email, $msg)
{
    $to = "averyhappycompany@gmail.com"; // reciepient
    $from = $email; // sender
    $first_name = $first;
    $last_name = $last;
    $subject = "Form submission";
    $subject2 = "Copy of your form submission";
    $message = $first_name . " " . $last_name . " wrote the following:" . "\n\n" . $msg;
    $message2 = "Here is a copy of your message " . $first_name . "\n\n" . $msg;

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to, $subject, $message, $headers);
    mail($from, $subject2, $message2, $headers2); // sends a copy of the message to the sender
    echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";
}

?>