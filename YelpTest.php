<?php
require_once('lib/OAuth.php');
$unsigned_url = "http://api.yelp.com/v2/search?location=Lawrenceville,GA";
if (isset($_POST["city"]) && isset($_POST["state"])) {
    $unsigned_url = "http://api.yelp.com/v2/search?" ."location=" . $_POST["city"] . "," . $_POST["state"];
}
if (isset($_POST["city"]) && isset($_POST["state"]) && $_POST["term"]) {
    $unsigned_url = "http://api.yelp.com/v2/search?". "term=". $_POST["term"] ."&location=" . $_POST["city"] . "," . $_POST["state"];
}


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
$response = json_decode($data);
$placeArray = array();

//var_dump($response);

//foreach ($response->places as $place) {
//    array_push($placeArray, $place);
//}
//$zipResource = "http://api.zippopotam.us/us/GA/Lawrenceville";

// Send Yelp API Call
//$ch2 = curl_init($zipResource);
//curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
//curl_setopt($ch2, CURLOPT_HEADER, 0);
//$data2 = curl_exec($ch2); // Yelp response
//curl_close($ch2);
// Handle Yelp response data
//$response2 = json_decode($data2);
//$zipList = array();
//foreach ($response2->places as $zip) {
//    array_push($zipList, $zip->{'post code'});
//}

//foreach ($zipList as $z) {
//    $zpZipCodeURL = "http://api.yelp.com/v2/search?location=" . $z;
//    $ch3 = curl_init($zpZipCodeURL);
 //   curl_setopt($ch3, CURLOPT_RETURNTRANSFER, true);
 //   curl_setopt($ch3, CURLOPT_HEADER, 0);
 //   $data3 = curl_exec($ch3); // Yelp response
 //   curl_close($ch3);
    //$response3 = json_decode($data3);
    //foreach ($response3->places as $place2) {
    //    array_push($placeArray, $place2);
   // }
//}
?>