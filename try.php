<?php
function searchAdditionalServices($jsonResponse) {
    // Decode the JSON response
    $responseArray = json_decode($jsonResponse, true);

    // Convert the array to a JSON string
    $jsonString = json_encode($responseArray);

    // Search for the word "additionalServices" in the JSON string
    if (strpos($jsonString, 'additionalServices') !== false) {
        return true;
    } else {
        return false;
    }
}
// Call the function and print the result
$services = searchAdditionalServices($jsonResponse);
var_dump($services);  // Outputs: bool(true) or bool(false)
?>
