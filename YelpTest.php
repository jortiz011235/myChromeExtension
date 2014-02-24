<?php 

	
	
	require_once ('lib/OAuth.php');
	$category_filter = "";
 	$unsigned_url = "http://api.yelp.com/v2/search?location=Lawrenceville,GA&category_filter="";
 	$searchByPhone_url = "http://api.yelp.com/phone_search?phone="; 


	// Set your keys here
	$consumer_key = "o5sP_VYDvoztc6vzC3kG5A";
	$consumer_secret = "_Ss0UC4LwpQxAPJ48VlQAUq2xDk";
	$token = "1AQhf2WrcE6J0zDD0aXlGFt9vGwUcZ4c";
	$token_secret = "paqZf-T1rDCQOSMtuffg5-56sWw";

	// Token object built using the OAuth library
	$token = new OAuthToken($token, $token_secret);

	// Consumer object built using the OAuth library
	$consumer = new OAuthConsumer($consumer_key, $consumer_secret);

	// Yelp uses HMAC SHA1 encoding
	$signature_method = new OAuthSignatureMethod_HMAC_SHA1();

	// Build OAuth Request using the OAuth PHP library. Uses the consumer and token object created above.
	$oauthrequest = OAuthRequest::from_consumer_and_token($consumer, $token, 'GET', $unsigned_url);

	// Sign the request
	$oauthrequest->sign_request($signature_method, $consumer, $token);

	// Get the signed URL
	$signed_url = $oauthrequest->to_url();

	// Send Yelp API Call
	$ch = curl_init($signed_url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	$data = curl_exec($ch); // Yelp response
	curl_close($ch);

	// Handle Yelp response data
	$response = json_decode($data);

	$randomRestNum = rand(0,count($response->businesses));



//
// From http://non-diligent.com/articles/yelp-apiv2-php-example/
//


// Enter the path that the oauth library is in relation to the php file


// For example, request business with id 'the-waterboy-sacramento'
//$unsigned_url = "http://api.yelp.com/v2/business/the-waterboy-sacramento";



?>