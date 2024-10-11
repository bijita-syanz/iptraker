<?php
header('Content-Type: application/json');

// Get the raw POST data
$data = file_get_contents('php://input');
$userData = json_decode($data, true);

// Check if the data is valid
if (json_last_error() !== JSON_ERROR_NONE) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid JSON']);
    exit;
}

// Define the file path
$filePath = 'data.json';

// Check if the file exists and create if not
if (!file_exists($filePath)) {
    file_put_contents($filePath, json_encode([]));
}

// Read existing data
$existingData = json_decode(file_get_contents($filePath), true);

// Append new data
$existingData[] = $userData;

// Save updated data back to the file
if (file_put_contents($filePath, json_encode($existingData, JSON_PRETTY_PRINT))) {
    echo json_encode(['success' => true]);
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to save data']);
}
?>
