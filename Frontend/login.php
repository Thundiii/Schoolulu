<!DOCTYPE html>
<?php
	session_start();
	$error = false;
	if(isset($_POST['submit'])) {

		$url = 'http://Thundiii.de:3033/api/user/login';
		$pwd = md5($_POST['password']);
		$data = array('username' => $_POST['username'], 'password' => $pwd);

		// Initialize CURL:
		$ch = curl_init($url);

		// get headers too with this line
		curl_setopt($ch, CURLOPT_HEADER, 1);

		// Set the request method to POST:
		curl_setopt($ch, CURLOPT_POST, 1);

		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

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

		// Close CURL:	
		curl_close($ch);
		

		if($httpcode == 200) {

			$json = json_decode($body, true);

			$_SESSION['name'] = $json['name'];

			header("Location: index.php");

		} else {
			$error = true;
		}

	} 
?>


<html>
<head>
	
	<title>Schoolulu | Login</title>
	<link rel="icon" type="image/vnd.icon" href="https://thundiii.de/Schoolulu/fav.ico">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="CSS/stylesheet_login.css"> 
</head>
<body>
<?php
	include("header.php");
?>
	<main>
		<section class="vh-100 gradient-custom">
            <div class="container py-5 h-100">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                  <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                      <div class="mb-md-5 mt-md-4 pb-5">
<?php
						if(isset($_SESSION['createdUser'])) {
							$_SESSION['createdUser'] = null;
							echo('<p class="text-success mb-5">Der Nutzer wurde erfolgreich erstellt. <br />Bitte melde dich an</p>');
						}
						if($error) {
							echo('<p class="text-red-50 mb-5">Der Username oder das Passwort ist falsch.</p>');
						}

?>
                        <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                        <p class="text-white-50 mb-5">Bitte geben Sie Ihren Username und ihr Passwort ein</p>
						<form action="login.php" method="post">
                        <div class="form-outline form-white mb-4">
                          <input type="text" name="username" id="typeEmailX" class="form-control form-control-lg" />
                          <label class="form-label" for="typeEmailX">Username</label>
                        </div>
          
                        <div class="form-outline form-white mb-4">
                          <input type="password" name="password" id="typePasswordX" class="form-control form-control-lg" />
                          <label class="form-label" for="typePasswordX">Passwort</label>
                        </div>
          
                        <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Passwort vergessen?</a></p>
          
                        <button class="btn btn-outline-light btn-lg px-5" name="submit" type="submit">Login</button>

						</form>
                      </div>
          
                      <div>
                        <p class="mb-0">Keinen Account? <a href="register.php" class="text-white-50 fw-bold">Registriere dich</a>
                        </p>
                      </div>
          
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
	</main>

	<footer>
		<p>&copy; 2023 Schoolulu. Alle Rechte vorbehalten.</p>
	</footer>
</body>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="JS/search.js"></script>
</html>
