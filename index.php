<?php

require_once 'bootstrap.php';

// Create the Transport
$transport = (new Swift_SmtpTransport($_ENV['MAIL_HOST'], $_ENV['MAIL_PORT'], $_ENV['MAIL_ENCRYPTION']))
  ->setUsername($_ENV['MAIL_USERNAME'])
  ->setPassword($_ENV['MAIL_PASSWORD']);

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message('Subject'))
  ->setFrom(['sender@email.com' => 'Sender Name'])
  ->setTo([$_ENV['MAIL_USERNAME'] => $_ENV['MAIL_FROM_NAME']])
  ->setBody('Here is the message itself');

// Send the message
$result = $mailer->send($message);