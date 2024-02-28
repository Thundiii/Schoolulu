<!DOCTYPE html>
<?php
	session_start();
	$error = false;

		$url = 'http://Thundiii.de:3033/api/school/all';


		// Initialize CURL:
		$ch = curl_init($url);

		// get headers too with this line
		curl_setopt($ch, CURLOPT_HEADER, 1);

		// Set the request method to POST:
		curl_setopt($ch, CURLOPT_HTTPGET, 1);


		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		// Execute the request and get the response:
		$response = curl_exec($ch);

		// Then, after your curl_exec call:
		$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
		$header = substr($response, 0, $header_size);
		$body = substr($response, $header_size);

		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

		preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $response, $matches);
		
		// Close CURL:	
		curl_close($ch);
		

		if($httpcode == 200) {

			$error = false;



		} else {
			$error = true;
		}
	 
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
   <link rel="stylesheet" type="text/css" href="CSS/stylesheet_schools.css"> 
    <title>Schoolulu | Schulen</title>
    <link rel="icon" type="image/vnd.icon" href="https://thundiii.de/Schoolulu/fav.ico">
</head>
<body>

<?php
include("header.php");
?>

<h1 class="fw-bold mb-2 text-uppercase text-white mt-4 mb-4">Übersicht aller Schulen:</h1>

<?php

if($error) {
  echo("Fehler :/");
  die();
} else {


  $json = json_decode($body, true);

  echo('<div class="container">
  <div class="row">');
  

  foreach($json as $i => $value) {




    $schoolname = $value['schoolname'];
    $city = $value['city'];
    $zipcode = $value['zipCode'];
    $logo = $value['logo'];
    $street = $value['street'];
    $housenumber = $value['houseNumber'];
    $score = $value['score'];
    $id = $value['id'];
    


    echo('
    <div class="col-sm d-flex justify-content-center">
    <div class="card border-dark mb-3" style="width: 18rem;">
    <img class="card-img-top" src=' . $logo . ' alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">' . $schoolname . '</h5>
      <p class="card-text">' . $street . ' ' . $housenumber . '</br>' . $zipcode . ' ' . $city . '</br> ');
      
      for ($i = 1; $i <= $score; $i++) {
            echo '<i class="fas fa-star"></i>';
        }

        if ($score != floor($score)) {
            if (($score - floor($score)) >= 0.8) {
                echo '<i class="fas fa-star"></i>';
            } else if (($score - floor($score)) >= 0.3) {
                echo '<i class="fas fa-star-half-alt"></i>';
            } else {
                echo '<i class="far fa-star"></i>';
            }
        }
        
        for ($i = ceil($score); $i < 5; $i++) {
            echo '<i class="far fa-star"></i>';
        }
        
      
      echo('</p>
      <a href="school.php?id=' . $id .'" class="btn btn-primary">Zur Schulseite</a>
    </div>
  </div>
  </div>
    ');
 
  }
 
  echo("</div>
  </div>
  ");
  

}

?>
</body>

<footer>
		<p>&copy; 2023 Schoolulu. Alle Rechte vorbehalten.</p>
</footer>

</html>
