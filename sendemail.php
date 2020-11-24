<?php

// Define some constants
define( "RECIPIENT_NAME", "Laurent CAVELIUS" );
define( "RECIPIENT_EMAIL", "laurent.cavelius@smart-energeia.com" );


// Read the form values
$success = false;
$userName = isset( $_POST['nom'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['nom'] ) : "";
$senderEmail = isset( $_POST['email'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['email'] ) : "";
$senderSubject = isset( $_POST['societe'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['societe'] ) : "";
$message = isset( $_POST['message'] ) ? preg_replace( "/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $_POST['message'] ) : "";

// If all values exist, send the email
if ( $userName && $senderEmail && $senderSubject && $message) {
  $recipient = RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">";
  $headers = "From: " . $userName . "";
  $msgBody = " Email: ". $senderEmail . "subject: ". $senderSubject . " Message: " . $message . "";
  $success = mail( $recipient, $headers, $msgBody );

  //Set Location After Successsfull Submission
  header('Location: index.html?message=Successfull');
}

else{
	//Set Location After Unsuccesssfull Submission
  	header('Location: contact.html?message=Failed');	
}

?>
