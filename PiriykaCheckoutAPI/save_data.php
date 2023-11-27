<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: *");
header('Content-Type: text/html; charset=utf-8');


// Get the incoming JSON data
$data = file_get_contents('php://input');
$data = json_decode($data, true);

// Check if any of the form fields is empty
if  (empty($data['products']) || empty($data['numberOfProducts']) || empty($data['price']) || empty($data['name']) || empty($data['lastname']) || empty($data['country']) || empty($data['province']) || empty($data['city']) || empty($data['address1']) || empty($data['postalCode']) || empty($data['phoneNumber'])|| empty($data['nationalCode'])) {
    echo json_encode(['message' => 'One or more form fields are empty. Data not submitted.']);
} else {
    // Read existing data from db.json
    $jsonPath = 'db.json';
    $jsonContent = file_get_contents($jsonPath);
    $existingData = json_decode($jsonContent, true);

    // Add new form data as an object to the existing array
    $existingData[] = $data;

    // Save the combined data back to db.json
    file_put_contents($jsonPath, json_encode($existingData));

    // Respond with success message
    echo json_encode(['message' => 'Data submitted successfully']);
}
?>
