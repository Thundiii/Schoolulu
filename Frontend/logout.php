<?php

    if(!isset($_SESSION)) {
        session_start();
    }

    $url = 'http://Thundiii.de:3033/api/user/logout';

    // Initialize CURL:
    $ch = curl_init($url);

    // Set the request method to POST:
    curl_setopt($ch, CURLOPT_POST, 1);

    // get headers too with this line
    curl_setopt($ch, CURLOPT_HEADER, 1);

    $cookies = array();
    foreach ($_COOKIE as $name => $value) {
        $cookies[] = $name . '=' . $value;
    }

    $cookieString = implode('; ', $cookies);
    curl_setopt($ch, CURLOPT_COOKIE, $cookieString);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute the request and get the response:
    $response = curl_exec($ch);

    // Then, after your curl_exec call:
    $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $header = substr($response, 0, $header_size);
    $body = substr($response, $header_size);

    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $response, $matches);

    $cookies = array();
    foreach($matches[1] as $item) {

        $split = explode("=", $item);

        setcookie($split[0], $split[1]);
    }

    echo($response);

    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    // Close CURL:	
    curl_close($ch);
 
    if($httpcode == 200) {

        session_destroy();
        header("Location: index.php");
        
    } else {
        session_destroy();
        header("Location: index.php");
        
    }

?>