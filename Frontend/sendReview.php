<?php
header('Content-Type: multipart/form-data');

$ARRAY = json_decode(file_get_contents("php://input"), true);

if (isset($ARRAY['sendReview'])) {

    $token = 2;

    $userId = $_COOKIE['s_token'];
    $schoolId = $ARRAY["schoolId"];
    $dto = $ARRAY["dto"];

    $review = json_encode($dto);

    $jsonFile = tmpfile();
    fwrite($jsonFile, $review);
    fseek($jsonFile, 0);

    $url = 'http://Thundiii.de:3033/api/review/create';
    $boundary = uniqid();

    $data = array(
        'token' => $userId,
        'schoolId' => $schoolId,
        'dto' => new CURLFile(stream_get_meta_data($jsonFile)['uri'], 'application/json', 'data.json')
    );

    // Build the multipart/form-data payload
    $payload = '';
    foreach ($data as $name => $value) {
        $payload .= "--" . $boundary . "\r\n";
        $payload .= 'Content-Disposition: form-data; name="' . $name . '"';
        if ($value instanceof CURLFile) {
            $payload .= '; filename="' . $value->getPostFilename() . '"';
            $payload .= "\r\n";
            $payload .= 'Content-Type: ' . $value->getMimeType();
            $payload .= "\r\n\r\n";
            $payload .= file_get_contents($value->getFilename());
        } else {
            $payload .= "\r\n\r\n";
            $payload .= $value;
        }
        $payload .= "\r\n";
    }
    $payload .= "--" . $boundary . "--\r\n";

    // Initialize CURL:
    $ch = curl_init($url);

    // Set the request method to POST:
    curl_setopt($ch, CURLOPT_POST, 1);

    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: multipart/form-data; boundary=' . $boundary
    ));

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    // Execute the request and get the response:
    $response = curl_exec($ch);

    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    fclose($jsonFile);

    echo($httpcode);

} else {
    echo json_encode("Error");
}
?>