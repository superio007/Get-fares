<?php
$url = 'https://sandboxapi.getfares.com/Flights/Revalidation/v1';
$traceId = "8024cdc9-4757-4b00-a299-e18abf46c58d";
$purchaseId = "638548784899729427";
$token = "eyJhbGciOiJSUzI1NiIsImtpZCI6IjU5M0U2OTVCRkJFNjhBQjhGMDc0N0EzOTM2MTcyMDkyIiwidHlwIjoiYXQrand0In0.eyJuYmYiOjE3MTkyODEzMjMsImV4cCI6MTcxOTg4NjEyMywiaXNzIjoiaHR0cDovL2FvZmlkZW50aXR5c2VydmVyLXNlcnZpY2UiLCJhdWQiOiJodHRwOi8vYW9maWRlbnRpdHlzZXJ2ZXItc2VydmljZS9yZXNvdXJjZXMiLCJjbGllbnRfaWQiOiJ0ZXN0LmNsaWVudCIsImJyYW5jaF9pZCI6IjAiLCJlbWFpbF9pZCI6IiIsImNsaWVudHJlZl9pZCI6IjEiLCJ1c2VyX2lkIjoidGVzdC5jbGllbnQiLCJmdWxsX25hbWUiOiJNeSBDbGllbnQiLCJhcGlfY2xpZW50X0lkIjoidGVzdC5jbGllbnQiLCJqdGkiOiIxNDc0NTI3RkZCMkVDOUE0QjRDMDkzNjIxRkQ4MjM4MSIsImlhdCI6MTcxOTI4MTMyMywic2NvcGUiOlsiRmxpZ2h0RW5naW5lIl19.e4tgp4lZrk6Wjv4YpPA7k4QTt9aoOus_5-F0YfAiDD6ElSRATz-0IzedaFY1htHWZWn2bz8LjzDLNuz6Nv5iW6PwahmraIEnGU6_Ll1u1_0HHHJPLUA-xcLmCNxLfLGyl-Gc6DHTR8jIDaTP2pgN7-9bK7JnZJryEEe2cc7XrYWa0WyslPjErJV5sknmIwsErNBNqJ-KylGbNywgcZSAiZCQHnfdxyV9mpWKtB6QGlZ0rxlL9VZSsR5ug02EFEG-0JZXlhxknRUC7HtSSDffuLIIc2E1pZJtl3vlnnf3DCThovwD9UPDoilSNGzayh0netWAy6XPannlYI_us-Wc3Q";

// Data to be sent in the body of the request
$data = [
    "traceId" => $traceId,
    "purchaseIds" => [$purchaseId]
];

// Convert data array to JSON format
$jsonData = json_encode($data);

// Initialize cURL session
$ch = curl_init();

// Set the URL and other options for the cURL session
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    "Authorization: Bearer $token"
]);

// Execute the cURL session and fetch the response
$response = curl_exec($ch);

// Check for errors
if ($response === false) {
    echo 'cURL Error: ' . curl_error($ch);
} else {
    // Decode and print the response
    $responseData = json_decode($response, true);
    var_dump($responseData);
}

// Close the cURL session
curl_close($ch);
?>
