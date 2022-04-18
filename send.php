<?php


// 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

// Uncomment next line if you're not using a dependency loader (such as Composer)
// require_once '<PATH TO>/sendgrid-php.php';

use SendGrid\Mail\Mail;

$email = new Mail();
$email->setFrom("test@example.com", "Example User");
$email->setSubject("Sending with Twilio SendGrid is Fun");
$email->addTo("test@example.com", "Example User");
$email->addContent("text/plain", "and easy to do anywhere, even with PHP");
$email->addContent(
    "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
);
$sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: '.  $e->getMessage(). "\n";
}

print_r($_POST);

die('{"status":"complete"}');
