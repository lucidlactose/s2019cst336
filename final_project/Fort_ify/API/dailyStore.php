<?php


// Setup the CURL session
$cSession = curl_init();

// Setup the CURL options
curl_setopt($cSession,CURLOPT_URL,"https://fortnite-public-api.theapinetwork.com/prod09/store/get?language=en");
curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
curl_setopt($cSession,CURLOPT_HEADER, false);

// Add headers to the HTTP command
curl_setopt($cSession,CURLOPT_HTTPHEADER, array(
    "Accept: application/json",
    "Content-Type: application/json",
));

// Execute the CURL command
$results = curl_exec($cSession);

// Check for specific non-zero error numbers
$errno = curl_errno($cSession);
if ($errno) {
    switch ($errno) {
        default:
            echo "Error #$errno...execution halted";
            break;
    }

    // Close the session and exit
    curl_close($cSession);
    exit();
}

// Close the session
curl_close($cSession);


// json_encode($results);
// $results = ($results);
$results = json_decode($results,true);
for($i = 0; $i < 10; $i++){
$data = json_encode($results['items'][$i]["item"]["images"]["information"]);
echo $data;
echo "<img src=" . $data . "/>";
}
?>