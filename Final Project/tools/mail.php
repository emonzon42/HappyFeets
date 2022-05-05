<?php
error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");


if ($_SERVER['REQUEST_METHOD'] == "GET") { // Has the form been submitted?

    if (empty($_GET['fname']) || empty($_GET['lname']) || empty($_GET['email']) || empty($_GET['msg'])) {
        echo "Please provide any missing values.";
        echo $_GET['fname'];
        echo $_GET['lname'];
        echo $_GET['email'];
        echo $_GET['msg'];
    } else if (!preg_match('/[A-z0-9]+@[A-z]+\./',$_GET['email'])){ 
        echo "Please enter a valid email address.";
    }else {
    //    include './secure/manguconsalami.php';
        include __DIR__.'/cleanup.php'; //clean up tools for data

        $first = validate($_GET['fname']);
        $last = validate($_GET['lname']);
        $mail = validate($_GET['email']);
        $msg = validate($_GET['msg']);


        //todo:add customer to db if they arent already there

        //todo:send email
        sendmail($first, $last, $mail, $msg); //sends email

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
    /*mail($to, $subject, $message, $headers);
    mail($from, $subject2, $message2, $headers2); // sends a copy of the message to the sender*/

    if (mail($to, $subject, $message, $headers) && mail($from, $subject2, $message2, $headers2)) {
        echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";
    } else{
        echo "We apologize, this action cannot be completed at this time (due to errors on our end!). Please try again later.";
    }
    
}

?>