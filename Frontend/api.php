<?php
// API-Anfrage durchführen und JSON-Daten erhalten
$url = 'http://thundiii.de:3033/api/school/all';
$data = file_get_contents($url);
$jsonData = json_decode($data);

// JSON-Daten zurückgeben
header('Content-Type: application/json');
echo json_encode($jsonData);
?>