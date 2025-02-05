<?php
/**
 * PHP Email Form Handler
 */

// Replace contact@example.com with your real receiving email address
$receiving_email_address = 'lalithd1@umbc.edu';

if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
  include( $php_email_form );
} else {
  die( 'Unable to load the "PHP Email Form" Library!');
}

$contact = new PHP_Email_Form;
$contact->ajax = true; // Enable AJAX to avoid page refresh

$contact->to = $receiving_email_address;
$contact->from_name = $_POST['name'];
$contact->from_email = $_POST['email'];
$contact->subject = $_POST['subject'];

// Optional: Use SMTP if you need a secure email configuration
/*
$contact->smtp = array(
  'host' => 'smtp.yourdomain.com',
  'username' => 'yourusername',
  'password' => 'yourpassword',
  'port' => '587'
);
*/

// Add message body
$contact->add_message( $_POST['name'], 'From');
$contact->add_message( $_POST['email'], 'Email');
$contact->add_message( $_POST['message'], 'Message', 10);

// Send the email
echo $contact->send();
?>