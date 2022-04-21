<?php

    function sendmail($first,$last,$email,$msg){
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