<?php

include('vendor/autoload.php');

use SendGrid\Mail\Mail;

$email = new Mail();
$email->setFrom("thomasadam83@hotmail.com", "Adam Thomas");
$email->setSubject("Contact Form Submission");
$email->addTo("thomasadam83@hotmail.com", "Adam Thomas");
$email->addContent(
    "text/plain", "You have received a contact form submission:
        
Name: ".$_POST['name']."
Email: ".$_PSOT['email']."
Message: ".$_PSOT['message']."

"
);
$email->addContent(
    "text/html", "You have received a contact form submission:
<br><br>      
Name: ".$_POST['name']."
<br>
Email: ".$_PSOT['email']."
<br>
Message: ".$_PSOT['message']."
        
"
);

$sendgrid = new \SendGrid('');
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


