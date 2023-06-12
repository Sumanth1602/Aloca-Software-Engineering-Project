<?php

/*
<?php
$to_email = "miglanichetanya79@gmail.com";
$subject = "Simple Email Test via PHP";
$body = "Hi, This is test email send by PHP Script";
$headers = 'From: alocaroom@gmail.com' . " " .
'Reply-To: alocaroom@gmail.com' . " " .
'X-Mailer: PHP/' . phpversion();
if (mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
} else {
    echo "Email sending failed...";
}



include('Mailin.php');
use Sendinblue\Mailin;
$api_key = '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';

$from_email = 'alocaroom@gmail.com';
$from_name = 'yo';

$to_email = 'miglanichetanya79@gmail.com';
$to_name = 'ho';
$subject = 'This is the subject';
$message = '<h2>Heading 2</h2><p>Here goes the paragraph blah blah blah</p>';

$mailin = new Mailin('https://api.sendinblue.com/v2.0',$api_key);
$data = array( 
  "to" => array($to_email=>$to_name),
  "from" => array($from_email,$from_name),
  "subject" => $subject,
  "html" => $message,
  "attachment" => array()
);

$response = $mailin->send_email($data);
if(isset($response['code']) && $response['code']=='success'){
  echo 'Email Sent';
}else{
  echo 'Email not sent';
}
exit;

*/

require("vendor/autoload.php");

$config = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', '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');

$apiInstance = new SendinBlue\Client\Api\TransactionalEmailsApi(
    new GuzzleHttp\Client(),
    $config
);
$sendSmtpEmail = new \SendinBlue\Client\Model\SendSmtpEmail();
$sendSmtpEmail['subject'] = 'Subject';
$sendSmtpEmail['htmlContent'] = '<html><body><h1>Tamasha is best movie </h1></body></html>';
$sendSmtpEmail['sender'] = array('name' => 'who knows?', 'email' => 'achedin@modi.gov.in');
$sendSmtpEmail['to'] = array(
    array('email' => 'vaichaw11@gmail.com', 'name' => 'Anonymous')
);

try {
    $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TransactionalEmailsApi->sendTransacEmail: ', $e->getMessage(), PHP_EOL;
}
