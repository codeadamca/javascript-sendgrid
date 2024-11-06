<?php

include('vendor/autoload.php');

use SendGrid\Mail\Mail;

$email = new Mail();
$email->setFrom("<FROM_EMAIL_ADDRESS>", "<FROM_EMAIL_NAME>");
$email->setSubject("Contact Form Submission");
$email->addTo("<TO_EMAIL_ADDRESS>", "<TO_EMAIL_NAME>");
$email->addContent(
    "text/plain", "You have received a contact form submission:
        
Name: ".$_POST['name']."
Email: ".$_POST['email']."
Message: ".$_POST['message']."

"
);
$email->addContent(
    "text/html", "You have received a contact form submission:
<br><br>      
Name: ".$_POST['name']."
<br>
Email: ".$_POST['email']."
<br>
Message: ".$_POST['message']."
        
"
);

$sendgrid = new \SendGrid('<SENDGRID_API_KEY>');
try {
    $response = $sendgrid->send($email);
    /*
    echo '<pre>';
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
    echo '</pre>';
    */
    die('{"status":"complete"}');
} catch (Exception $e) {
    /*
    echo 'Caught exception: '.  $e->getMessage(). "\n";
    */
    die('{"status":"error"}');
}


