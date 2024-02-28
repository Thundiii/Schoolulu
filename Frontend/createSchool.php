<!DOCTYPE html>
<html>
   <head>
      <title>Schoolulu | Einreichen</title>
      <link rel="icon" type="image/vnd.icon" href="https://thundiii.de/Schoolulu/fav.ico">
      <link rel="stylesheet" type="text/css" href="CSS/stylesheet_createschool.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
   </head>
   <body>
      <?php
         if(isset($_POST["submit"])) {
           $url = 'http://Thundiii.de:3033/api/school/create';
           $data = array('schoolname' => $_POST['name'],'city' => $_POST['stadt'],'zipCode' => $_POST['plz'],'street' => $_POST['straße'],'houseNumber' => $_POST['housenumber'],'logo' => $_POST['logo']);
           
           // Initialize CURL:
           $ch = curl_init($url);
           
           // Set the request method to POST:
           curl_setopt($ch, CURLOPT_POST, 1);
           
           curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
           
           curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
           
           // Execute the request and get the response:
           $response = curl_exec($ch);
           if($response == 200) {
            echo($response);
           } else {
             echo($response);
           }
         }
             include("header.php");
         ?>
      <main>
      <section class="gradient-custom">
         <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center">
               <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                  <div class="card bg-dark text-white" style="border-radius: 1rem;">
                     <div class="card-body p-5 text-center">
                        <div class="mt-md-4">
                           <h2 class="fw-bold mb-2 text-uppercase">Schule einreichen</h2>
                           <p class="text-white-50 mb-5">Bitte geben Sie die Daten Ihrer Schule ein.</p>
                           <form action="createSchool.php" method="post">
                              <div class="form-outline form-white mb-4">
                                 <input type="text" id="name" name="name" class="form-control form-control-lg" required>
                                 <label class="form-label" for="name">Name der Schule</label>    
                              </div>
                              <div class="form-outline form-white mb-4">
                                 <input type="number" id="plz" name="plz" class="form-control form-control-lg" required>
                                 <label class="form-label" for="plz">Postleitzahl</label>
                              </div>
                              <div class="form-outline form-white mb-4">
                                 <input type="text" id="stadt" name="stadt" class="form-control form-control-lg" required>
                                 <label class="form-label" for="stadt">Stadt</label>
                              </div>
                              <div class="form-outline form-white mb-4">
                                 <input type="text" id="straße" name="straße" class="form-control form-control-lg" required>
                                 <label class="form-label" for="adresse">Straße:</label>
                              </div>
                              <div class="form-outline form-white mb-4">
                                 <input type="number" id="housenumber" name="housenumber" class="form-control form-control-lg" required>
                                 <label class="form-label" for="plz">Hausnummer</label>
                              </div>
                              <div class="form-outline form-white mb-4">
                                 <input type="url" id="logo" name="logo" class="form-control form-control-lg" required>
                                 <label class="form-label" for="logo">Schul-Logo URL</label>
                              </div>
                              <div class="form-outline form-white mb-4">
                                 <button class="btn btn-outline-light btn-lg px-5" name="submit" type="submit">Absenden</button>
                           </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <footer>
         <p>&copy; 2023 Schoolulu. Alle Rechte vorbehalten.</p>
      </footer>
   </body>
</html>