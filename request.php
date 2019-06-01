<?php
$defaultLocation = "90005";
$data = json_decode(callLocation($defaultLocation));
$error = "";
//Zipcode Form
if (isset($_POST['submit'])){

    $error = "";
    $location = $_POST['zipcode'];
    $data = json_decode(callLocation($location)); 

    //If zipcode not found, call default location and show error
    if (@$data->cod == 404 || @$data->sys->country != "US"){
        $error = "Invalid Zipcode!";
        $data = json_decode(callLocation($defaultLocation)); 
    }

}

//Easy to understand Wind
$windSpeed = @$data->wind->speed;
switch(true){
    case $windSpeed >= 13:
        $windResponse = "Breezy";
        break;

    case $windSpeed >= 25:
        $windResponse = "Windy";
        break;
    
    case $windSpeed >= 32:
        $windResponse = "Its rough out there!";
        break;

    case $windSpeed >= 39:
        $windResponse = "Potentially Hazardous Winds!";
        break;

    default:
        $windResponse = "Calm";
}

//Search API for Zipcode
function callLocation($zipcode){
        $error = "";
        $key = #API key here;
        $url = "http://api.openweathermap.org/data/2.5/weather?zip=" . $zipcode . "&lang=en&units=imperial&APPID=" . $key;

        $call = curl_init();

        curl_setopt($call, CURLOPT_HEADER, 0);
        curl_setopt($call, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($call, CURLOPT_URL, $url);
        curl_setopt($call, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($call, CURLOPT_VERBOSE, 0);
        curl_setopt($call, CURLOPT_SSL_VERIFYPEER, false);

    $response =  curl_exec($call); 
    $weather = json_decode($response);
    $time = time();
    return $response;     
    curl_close($call);
}

   

?>