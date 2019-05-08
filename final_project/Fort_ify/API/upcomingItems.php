<?php

// Set the API key for my test account
$apiKey = "BQAdb36wnBSvx0vNHQ8xdmuxy5kdfgdJHauf4OmYoIekHlo5uG3K_XFXQPyY5nax5e6CTJUDhuKTL2m84-aTQYvXkEjMCMCt8zIpKriekDrB571834tPeVsiVHXrnhaHUSlQE-oe_TqiVRHuCq6jYGRJ-9NQ54q8P1UMwUEVbSi-gCVooWvLiXaWVLYR71ejwX8XN71TzclzhbxaHSULms-PVSuhNEmTUueTUxktjX2n";
$query = "night%20moves";
$type = "track";
$market = "US";

// Setup the CURL session
$cSession = curl_init();

// Setup the CURL options
curl_setopt($cSession,CURLOPT_URL,"https://fortnite-public-api.theapinetwork.com/prod09/upcoming/get");
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

// HintL: it is sometimes helpful to take echo the
// $results out and copy the array, then paste it into
// a beautifier online to see the data. For example, you
// could put the string JSON $results into the site
// https://codebeautify.org/jsonviewer

// Convert the results to an associative array
// $data = json_decode($results);

echo $results;
// Let's just get one of the items and echo the JSON for that only.
// echo json_encode($data);

?>