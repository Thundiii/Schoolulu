<html>
<head>
	
	<title>Schoolulu | Registrieren</title>
  <link rel="icon" type="image/vnd.icon" href="https://thundiii.de/Schoolulu/fav.ico">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="CSS/stylesheet_login.css"> 
</head>
<body>
<?php
	include("header.php");

  $userExists = false;
  $serverError = false;
  $allfields = false;
  $noSpace = false;

  if(isset($_POST['submit'])) {

      $email = $_POST['email'];
      $username = $_POST['username'];
      $password = $_POST['password'];

      $url = 'http://Thundiii.de:3033/api/user/create';
      $pwd = md5($_POST['password']);
      $data = array('username' => $username, 'email' => $email,'password' => $pwd);

      // Initialize CURL:
      $ch = curl_init($url);

      // Set the request method to POST:
      curl_setopt($ch, CURLOPT_POST, 1);

      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

      // Execute the request and get the response:
      $response = curl_exec($ch);

      $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);


      // Close CURL:	
      curl_close($ch);

      if($httpcode == 200) {

        $_SESSION['createdUser'] = true;
        header("Location: login.php");

      } else if($httpcode == 500 || $httpcode == 0){

        $serverError = true;
        
      } else if($httpcode == 409) {
        $userExists = true;
      } else if($httpcode == 405) {
        $allfields = true;
      } else if($httpcode == 403) {
        $noSpace = true;
      
      } else {
        $nothandled = $httpcode;
      }

  }


?>
	<main>
		<section class="vh-100 gradient-custom">
            <div class="container py-5 h-100">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                  <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

<?php
                    if($serverError) {
                      echo('<p class="text-danger mb-5">Ein Serverfehler ist aufgetreten.<br />Bitte versuchen Sie es später erneut.</p>');
                    } else if($userExists) {
                      echo('<p class="text-danger mb-5">Der Username oder die E-Mail Adresse ist bereits vergeben.</p>');  
                    } else if($allfields) {
                      echo('<p class="text-danger mb-5">Bitte füllen Sie alle Felder aus.</p>');  
                    } else if($noSpace) {
                      echo('<p class="text-danger mb-5">Die Felder dürfen keine Leerzeichen enthalten.</p>');    
                    }

                    if(isset($nothandled)) {

                      echo('<p class="text-danger mb-5">Ein Unbekannter Fehler ist aufgetreten. <br />Fehlercode: ' . $nothandled . '</p>');  

                    }

?>
                      <div class="mt-md-4">
                        <h2 class="fw-bold mb-2 text-uppercase">Registrieren</h2>
                        <p class="text-white-50 mb-5">Bitte geben Sie folgende Daten ein</p>
						<form action="register.php" method="post">
                        <div class="form-outline form-white mb-4">
                          <input type="text" name="email" id="typeEmailX" class="form-control form-control-lg" />
                          <label class="form-label" for="typeEmailX">E-Mail Adresse</label>
                        </div>
          
                        <div class="form-outline form-white mb-4">
                          <input type="text" name="username" id="typeEmailX" class="form-control form-control-lg" />
                          <label class="form-label" for="typeEmailX">Benutzername</label>
                        </div>

                        <div class="form-outline form-white mb-4">
                          <input type="password" name="password" id="typePasswordX" class="form-control form-control-lg" />
                          <label class="form-label" for="typePasswordX">Passwort</label>
                        </div>

                        <div class="form-outline form-white mb-4">
                          <input type="password" name="password" id="typePasswordX" class="form-control form-control-lg" />
                          <label class="form-label" for="typePasswordX">Passwort wiederholen</label>
                        </div>
          
                        <button class="btn btn-outline-light btn-lg px-5" name="submit" type="submit">Registrieren</button>

						</form>
                      </div>
          
                      <div>
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
</html>
