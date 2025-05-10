<?php
  /**
   * PHP Email Form v1.3.8
   * https://bootstrapmade.com/php-email-form/
   *
   * Copyright 2017 BootstrapMade (https://bootstrapmade.com)
   * License: https://bootstrapmade.com/license/
   */

  // Replace with your real receiving email address
  $receiving_email_address = 'info@example.com'; // Change this to your actual email

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;

  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'] ?? '';
  $contact->from_email = $_POST['email'] ?? '';
  $contact->subject = $_POST['subject'] ?? 'Contact Form Submission'; // Added a default subject

  // Configure SMTP settings if needed (uncomment and modify)
  /*
  $contact->smtp = array(
    'host' => 'your_smtp_host.com',
    'username' => 'your_smtp_username',
    'password' => 'your_smtp_password',
    'port' => 'your_smtp_port'
  );
  */

  $contact->add_message( $_POST['name'] ?? '', 'From');
  $contact->add_message( $_POST['email'] ?? '', 'Email');
  $contact->add_message( $_POST['message'] ?? '', 'Message', 10); // Added a max length of 1000 (example)

  echo $contact->send();
?>