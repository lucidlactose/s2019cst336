<?php
//step1
$cSession = curl_init();

//step2
// key: 12231104-58a017091d56d05c78d72564d
$apiKey = "12231104-58a017091d56d05c78d72564d";

// Setup the CURL session
$cSession = curl_init();

// Setup the CURL options
curl_setopt($cSession,CURLOPT_URL,"https://pixabay.com/api/");
curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
curl_setopt($cSession,CURLOPT_HEADER, false);

// Add headers to the HTTP command
curl_setopt($cSession,CURLOPT_HTTPHEADER, array(
    "Accept: application/json",
    "Content-Type: application/json",
    "Authorization: Bearer $apiKey"
));

// Execute the CURL command
$results = curl_exec($cSession);
echo $results;

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

curl_close($cSession);

// HintL: it is sometimes helpful to take echo the
// $results out and copy the array, then paste it into
// a beautifier online to see the data. For example, you
// could put the string JSON $results into the site
// https://codebeautify.org/jsonviewer

// Convert the results to an associative array
$musicData = json_decode($results);
// Let's just get one of the items and echo the JSON for that only.

echo json_encode($musicData);
?>