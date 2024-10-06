<?php
// Get the raw POST data
$data = file_get_contents("php://input");

// Decode the JSON data
$jsonData = json_decode($data, true);

// File path to save data
$filePath = 'data.json';

// Read existing data
$existingData = [];
if (file_exists($filePath)) {
    $existingData = json_decode(file_get_contents($filePath), true);
}

// Append new data
$existingData[] = $jsonData;

// Save the updated data back to the file
file_put_contents($filePath, json_encode($existingData, JSON_PRETTY_PRINT));

// Respond with a success message
header('Content-Type: application/json');
echo json_encode(['message' => 'Data saved successfully!']);
?>
