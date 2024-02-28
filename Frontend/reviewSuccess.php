<!DOCTYPE html>
<html>
   <head>
      <title>Schoolulu | Bewertung</title>
      <link rel="icon" type="image/vnd.icon" href="https://thundiii.de/Schoolulu/fav.ico">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="CSS/stylesheet_reviewsuccess.css">
      <script src="JS/redirect.js"></script>
   </head>
   <body>

<?php

    if(!isset($_GET["schoolId"])) {
        header("Location: index.php");
    }

    $url = 'http://Thundiii.de:3033/api/school/get';
    $data = array('schoolid' => $_GET['schoolId']);

    // Initialize CURL:
    $ch = curl_init($url);

    // Set the request method to POST:
    curl_setopt($ch, CURLOPT_POST, 1);

    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    // Execute the request and get the response:
    $response = curl_exec($ch);

    $json = json_decode($response, true);

    include("header.php");

    echo("<h1 class='text-white text-center mt-50'>Deine Bewertung für " . $json['schoolname'] . " war erfolgreich!");
?>
</br>
<h2 class="text-white h6 text-center mt-50"> Sie werden nach 5 Sekunden automatisch weitergeleitet </h2>
</body>
</html>