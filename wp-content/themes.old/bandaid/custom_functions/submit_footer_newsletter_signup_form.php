<?php
  

add_action( 'wp_ajax_newsletter_submit_action', 'newsletter_submit_action');
add_action( 'wp_ajax_nopriv_newsletter_submit_action', 'newsletter_submit_action');

function newsletter_submit_action() {
    $response = array(
    	'error' => false,
    	'success_message' => 'You have been subscribed successfully.'
    );
		
		if ( ! isset( $_POST['newsletter_nonce'] ) || ! wp_verify_nonce( $_POST['newsletter_nonce'], 'newsletter_action_nonce') ) {
      $response['error'] = true;
    	$response['error_message'] = 'The form is not valid';
    	exit(json_encode($response));
    }
    
		$email = sanitize_email($_POST['email']);
    if (trim($email) == '') {
    	$response['error'] = true;
    	$response['error_message'] = 'Email Address is required';
    	exit(json_encode($response));
    }
    
    if(!is_email( $email )){
    	$response['error'] = true;
    	$response['error_message'] = 'Email Address is not valid';
    	exit(json_encode($response));
    }
 
    
 //Email information
  $to = 'bwobst@gmail.com';
  $subject = 'Request to be added to monthly newsletter';
  $message = $email . ' has filled out the website footer form indicating that they would like to be added to the monthly newsletter.';
  $headers = 'From: ' . $email;
  
  //send email
  wp_mail( $to, $subject, $message, $headers, $attachments = array() );
  exit(json_encode($response));
}


//require_once("../../../../wp-load.php");
  
  //Email information
 /* $to = 'bwobst@gmail.com';
  $subject = 'Request to be added to monthly newsletter';
  $message = $_REQUEST['email'] . ' has filled out the website footer form indicating that they would like to be added to the monthly newsletter.';
  $headers = 'From: ' . $_REQUEST['email'];
  */
  //send email
  //wp_mail( $to, $subject, $message, $headers, $attachments = array() );
  
  // mail($to,$subject,$message);