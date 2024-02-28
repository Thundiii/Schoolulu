<!DOCTYPE html>
<html>
   <head>
      <title>Schoolulu | Bewertung</title>
      <link rel="icon" type="image/vnd.icon" href="https://thundiii.de/Schoolulu/fav.ico">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="CSS/stylesheet_review.css">
      <script src="JS/reviewform.js"></script>
   </head>
   <body>
      <?php


         if(!isset($_COOKIE['s_token'])) {
            header("Location: login.php");
         }

         if(!isset($_GET['schoolId'])) {
            header("Location: schools.php");
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

         $schoolid = $json['id'];

         echo("<p class='schoolid' style='display:none;'>" . $schoolid . "</p>");
         echo("<p class='token' style='display:none;'>" . $_COOKIE['s_token'] . "</p>");
         



         include("header.php");
         ?>
      <div id="container">
         <div class="mx-0 mx-sm-auto mt-4">
            <div class="card">
               <div class="card-header bg-primary">
                  <h5 class="card-title text-white mt-2" id="exampleModalLabel">
<?php   
                  echo("Bewertung von " . $json['schoolname']);
?>     
                  </h5>
                  </div>
               <div class="modal-body bg-dark text-white">
                  <div class="text-center">
                     <i class="far fa-file-alt fa-4x mb-3 text-primary"></i>
                     <p>
                        <strong>Ihr Feedback hilft</strong>
                     </p>
                     <p>
                        Bewerten Sie die folgenden Leistungen der Schule und geben Sie Anregungen.
                     </p>
                  </div>
                  <hr />
                  <!-----------------------------------------------------------------------Fach Kompetenz------------------------------------------------------------------------------------------------>
                  <form class="px-4" action="">
                     </br> 
                     <div class="section" name="competence">
                        <p class="text-center"><strong>Fach Kompetenz:</strong></p>
                        <p style="display:none;" class="text-danger text-center">Bitte tätigen Sie eine Auswahl.</p>
                        <div class="row justify-content-center text-center">
                           <div class="col">
                              <div class="form-check mb-2">
                                 <input class="form-check-input" type="radio" name="KompetenzForm" id="radioKompetenz1" />
                                 <label class="form-check-label" for="radioKompetenz1">
                                 1
                                 </label>
                              </div>
                           </div>
                           <div class="col">
                              <div class="form-check mb-2">
                                 <input class="form-check-input" type="radio" name="KompetenzForm" id="radioKompetenz2" />
                                 <label class="form-check-label" for="radioKompetenz2">
                                 2
                                 </label>
                              </div>
                           </div>
                           <div class="col">
                              <div class="form-check mb-2">
                                 <input class="form-check-input" type="radio" name="KompetenzForm" id="radioKompetenz3" />
                                 <label class="form-check-label" for="radioKompetenz3">
                                 3
                                 </label>
                              </div>
                           </div>
                           <div class="col">
                              <div class="form-check mb-2">
                                 <input class="form-check-input" type="radio" name="KompetenzForm" id="radioKompetenz4" />
                                 <label class="form-check-label" for="radioKompetenz4">
                                 4
                                 </label>
                              </div>
                           </div>
                           <div class="col">
                              <div class="form-check mb-2">
                                 <input class="form-check-input" type="radio" name="KompetenzForm" id="radioKompetenz5" />
                                 <label class="form-check-label" for="radioKompetenz5">
                                 5
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-----------------------------------------------------------------------Arbeitsatmosphäre------------------------------------------------------------------------------------------------>
                     </br> </br>
                     <div class="section" name="atmosphere">
                        <p class="text-center"><strong>Arbeitsatmosphäre:</strong></p>
                        <p style="display:none;" class="text-danger text-center">Bitte tätigen Sie eine Auswahl.</p>
                        <div class="row justify-content-center text-center">
                           <div class="col">
                              <div class="form-check mb-2">
                                 <input class="form-check-input" type="radio" name="AtmosphäreForm" id="radioAtmosphäre1" />
                                 <label class="form-check-label" for="radioAtmosphäre1">
                                 1
                                 </label>
                              </div>
                           </div>
                           <div class="col">
                              <div class="form-check mb-2">
                                 <input class="form-check-input" type="radio" name="AtmosphäreForm" id="radioAtmosphäre2" />
                                 <label class="form-check-label" for="radioAtmosphäre2">
                                 2
                                 </label>
                              </div>
                           </div>
                           <div class="col">
                              <div class="form-check mb-2">
                                 <input class="form-check-input" type="radio" name="AtmosphäreForm" id="radioAtmosphäre3" />
                                 <label class="form-check-label" for="radioAtmosphäre3">
                                 3
                                 </label>
                              </div>
                           </div>
                           <div class="col">
                              <div class="form-check mb-2">
                                 <input class="form-check-input" type="radio" name="AtmosphäreForm" id="radioAtmosphäre4" />
                                 <label class="form-check-label" for="radioAtmosphäre4">
                                 4
                                 </label>
                              </div>
                           </div>
                           <div class="col">
                              <div class="form-check mb-2">
                                 <input class="form-check-input" type="radio" name="AtmosphäreForm" id="radioAtmosphäre5" />
                                 <label class="form-check-label" for="radioAtmosphäre5">
                                 5
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-----------------------------------------------------------------------Hygiene------------------------------------------------------------------------------------------------>
                     </br> </br> 
                     <div class="section" name="toilets">
                        <p class="text-center"><strong>Sanitätseinrichtungen:</strong></p>
                        <p style="display:none;" class="text-danger text-center">Bitte tätigen Sie eine Auswahl.</p>
                        <div class="row justify-content-center text-center">
                           <div class="col">
                              <div class="form-check mb-2">
                                 <input class="form-check-input" type="radio" name="HygieneForm" id="radioHygiene1" />
                                 <label class="form-check-label" for="radioHygiene1">
                                 1
                                 </label>
                              </div>
                           </div>
                           <div class="col">
                              <div class="form-check mb-2">
                                 <input class="form-check-input" type="radio" name="HygieneForm" id="radioHygiene2" />
                                 <label class="form-check-label" for="radioHygiene2">
                                 2
                                 </label>
                              </div>
                           </div>
                           <div class="col">
                              <div class="form-check mb-2">
                                 <input class="form-check-input" type="radio" name="HygieneForm" id="radioHygiene3" />
                                 <label class="form-check-label" for="radioHygiene3">
                                 3
                                 </label>
                              </div>
                           </div>
                           <div class="col">
                              <div class="form-check mb-2">
                                 <input class="form-check-input" type="radio" name="HygieneForm" id="radioHygiene4" />
                                 <label class="form-check-label" for="radioHygiene4">
                                 4
                                 </label>
                              </div>
                           </div>
                           <div class="col">
                              <div class="form-check mb-2">
                                 <input class="form-check-input" type="radio" name="HygieneForm" id="radioHygiene5" />
                                 <label class="form-check-label" for="radioHygiene5">
                                 5
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-----------------------------------------------------------------------Raum Ausstattung------------------------------------------------------------------------------------------------>
                     </br> </br>
                     <div class="section" name="roomEquipment">
                        <p class="text-center"><strong>Raum Ausstattung:</strong></p>
                        <p style="display:none;" class="text-danger text-center">Bitte tätigen Sie eine Auswahl</p>
                        <div class="row justify-content-center text-center">
                           <div class="col">
                              <div class="form-check mb-2">
                                 <input class="form-check-input" type="radio" name="AusstattungForm" id="radioAusstattung1" />
                                 <label class="form-check-label" for="radioAusstattung1">
                                 1
                                 </label>
                              </div>
                           </div>
                           <div class="col">
                              <div class="form-check mb-2">
                                 <input class="form-check-input" type="radio" name="AusstattungForm" id="radioAusstattung2" />
                                 <label class="form-check-label" for="radioAusstattung2">
                                 2
                                 </label>
                              </div>
                           </div>
                           <div class="col">
                              <div class="form-check mb-2">
                                 <input class="form-check-input" type="radio" name="AusstattungForm" id="radioAusstattung3" />
                                 <label class="form-check-label" for="radioAusstattung3">
                                 3
                                 </label>
                              </div>
                           </div>
                           <div class="col">
                              <div class="form-check mb-2">
                                 <input class="form-check-input" type="radio" name="AusstattungForm" id="radioAusstattung4" />
                                 <label class="form-check-label" for="radioAusstattung4">
                                 4
                                 </label>
                              </div>
                           </div>
                           <div class="col">
                              <div class="form-check mb-2">
                                 <input class="form-check-input" type="radio" name="AusstattungForm" id="radioAusstattung5" />
                                 <label class="form-check-label" for="radioAusstattung5">
                                 5
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-----------------------------------------------------------------------Gleichberechtigung------------------------------------------------------------------------------------------------>
                     </br> </br> 
                     <div class="section" name="equality">
                        <p class="text-center"><strong>Gleichberechtigung:</strong></p>
                        <p style="display:none;" class="text-danger text-center">Bitte tätigen Sie eine Auswahl</p>
                        <div class="row justify-content-center text-center">
                           <div class="col">
                              <div class="form-check mb-2">
                                 <input class="form-check-input" type="radio" name="GleichberechtigungForm" id="radioGleichberechtigung1" />
                                 <label class="form-check-label" for="radioGleichberechtigung1">
                                 1
                                 </label>
                              </div>
                           </div>
                           <div class="col">
                              <div class="form-check mb-2">
                                 <input class="form-check-input" type="radio" name="GleichberechtigungForm" id="radioGleichberechtigung2" />
                                 <label class="form-check-label" for="radioGleichberechtigung2">
                                 2
                                 </label>
                              </div>
                           </div>
                           <div class="col">
                              <div class="form-check mb-2">
                                 <input class="form-check-input" type="radio" name="GleichberechtigungForm" id="radioGleichberechtigung3" />
                                 <label class="form-check-label" for="radioGleichberechtigung3">
                                 3
                                 </label>
                              </div>
                           </div>
                           <div class="col">
                              <div class="form-check mb-2">
                                 <input class="form-check-input" type="radio" name="GleichberechtigungForm" id="radioGleichberechtigung4" />
                                 <label class="form-check-label" for="radioGleichberechtigung4">
                                 4
                                 </label>
                              </div>
                           </div>
                           <div class="col">
                              <div class="form-check mb-2">
                                 <input class="form-check-input" type="radio" name="GleichberechtigungForm" id="radioGleichberechtigung5" />
                                 <label class="form-check-label" for="radioGleichberechtigung5">
                                 5
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
<!-----------------------------------------------------------------------Mitschüler------------------------------------------------------------------------------------------------>
</br> </br> 
                     <div class="section" name="mateHandling">
                        <p class="text-center"><strong>Umgang mit Mitschülern:</strong></p>
                        <p style="display:none;" class="text-danger text-center">Bitte tätigen Sie eine Auswahl.</p>
                        <div class="row justify-content-center text-center">
                           <div class="col">
                              <div class="form-check mb-2">
                                 <input class="form-check-input" type="radio" name="MateForm" id="radioMates1" />
                                 <label class="form-check-label" for="radioMates1">
                                 1
                                 </label>
                              </div>
                           </div>
                           <div class="col">
                              <div class="form-check mb-2">
                                 <input class="form-check-input" type="radio" name="MateForm" id="radioMates2" />
                                 <label class="form-check-label" for="radioMates2">
                                 2
                                 </label>
                              </div>
                           </div>
                           <div class="col">
                              <div class="form-check mb-2">
                                 <input class="form-check-input" type="radio" name="MateForm" id="radioMates3" />
                                 <label class="form-check-label" for="radioMates3">
                                 3
                                 </label>
                              </div>
                           </div>
                           <div class="col">
                              <div class="form-check mb-2">
                                 <input class="form-check-input" type="radio" name="MateForm" id="radioMates4" />
                                 <label class="form-check-label" for="radioMates4">
                                 4
                                 </label>
                              </div>
                           </div>
                           <div class="col">
                              <div class="form-check mb-2">
                                 <input class="form-check-input" type="radio" name="MateForm" id="radioMates5" />
                                 <label class="form-check-label" for="radioMates5">
                                 5
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-----------------------------------------------------------------------Barrierefreiheit------------------------------------------------------------------------------------------------>
                     </br> </br> 
                     <div class="section" name="accessibility">
                        <p class="text-center"><strong>Barrierefreiheit:</strong></p>
                        <p style="display:none;" class="text-danger text-center">Bitte tätigen Sie eine Auswahl</p>
                        <div class="row justify-content-center text-center">
                           <div class="col">
                              <div class="form-check mb-2">
                                 <input class="form-check-input" type="radio" name="BarrierefreiheitForm" id="radioBarrierefreiheit1" />
                                 <label class="form-check-label" for="radioBarrierefreiheit1">
                                 1
                                 </label>
                              </div>
                           </div>
                           <div class="col">
                              <div class="form-check mb-2">
                                 <input class="form-check-input" type="radio" name="BarrierefreiheitForm" id="radioBarrierefreiheit2" />
                                 <label class="form-check-label" for="radioBarrierefreiheit2">
                                 2
                                 </label>
                              </div>
                           </div>
                           <div class="col">
                              <div class="form-check mb-2">
                                 <input class="form-check-input" type="radio" name="BarrierefreiheitForm" id="radioBarrierefreiheit3" />
                                 <label class="form-check-label" for="radioBarrierefreiheit3">
                                 3
                                 </label>
                              </div>
                           </div>
                           <div class="col">
                              <div class="form-check mb-2">
                                 <input class="form-check-input" type="radio" name="BarrierefreiheitForm" id="radioBarrierefreiheit4" />
                                 <label class="form-check-label" for="radioBarrierefreiheit4">
                                 4
                                 </label>
                              </div>
                           </div>
                           <div class="col">
                              <div class="form-check mb-2">
                                 <input class="form-check-input" type="radio" name="BarrierefreiheitForm" id="radioBarrierefreiheit5" />
                                 <label class="form-check-label" for="radioBarrierefreiheit5">
                                 5
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-----------------------------------------------------------------------Verkehrsanbindung------------------------------------------------------------------------------------------------>
                     </br> </br> 
                     <div class="section" name="transportConnections">
                        <p class="text-center"><strong>Verkehrsanbindung:</strong></p>
                        <p style="display:none;" class="text-danger text-center">Bitte tätigen Sie eine Auswahl</p>
                        <div class="row justify-content-center text-center">
                           <div class="col">
                              <div class="form-check mb-2">
                                 <input class="form-check-input" type="radio" name="VerkehrsanbindungForm" id="radioVerkehrsanbindung1" />
                                 <label class="form-check-label" for="radioVerkehrsanbindung1">
                                 1
                                 </label>
                              </div>
                           </div>
                           <div class="col">
                              <div class="form-check mb-2">
                                 <input class="form-check-input" type="radio" name="VerkehrsanbindungForm" id="radioVerkehrsanbindung2" />
                                 <label class="form-check-label" for="radioVerkehrsanbindung2">
                                 2
                                 </label>
                              </div>
                           </div>
                           <div class="col">
                              <div class="form-check mb-2">
                                 <input class="form-check-input" type="radio" name="VerkehrsanbindungForm" id="radioVerkehrsanbindung3" />
                                 <label class="form-check-label" for="radioVerkehrsanbindung3">
                                 3
                                 </label>
                              </div>
                           </div>
                           <div class="col">
                              <div class="form-check mb-2">
                                 <input class="form-check-input" type="radio" name="VerkehrsanbindungForm" id="radioVerkehrsanbindung4" />
                                 <label class="form-check-label" for="radioVerkehrsanbindung4">
                                 4
                                 </label>
                              </div>
                           </div>
                           <div class="col">
                              <div class="form-check mb-2">
                                 <input class="form-check-input" type="radio" name="VerkehrsanbindungForm" id="radioVerkehrsanbindung5" />
                                 <label class="form-check-label" for="radioVerkehrsanbindung5">
                                 5
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-----------------------------------------------------------------------Parkplätze------------------------------------------------------------------------------------------------>
                     </br> </br>
                     <div class="section" name="parkingSpot">
                        <p class="text-center"><strong>Parkplätze:</strong></p>
                        <p style="display:none;" class="text-danger text-center">Bitte tätigen Sie eine Auswahl</p>
                        <div class="row justify-content-center text-center">
                           <div class="col">
                              <div class="form-check mb-2">
                                 <input class="form-check-input" type="radio" name="ParkplätzeForm" id="radioParkplätze1" />
                                 <label class="form-check-label" for="radioParkplätze1">
                                 1
                                 </label>
                              </div>
                           </div>
                           <div class="col">
                              <div class="form-check mb-2">
                                 <input class="form-check-input" type="radio" name="ParkplätzeForm" id="radioParkplätze2" />
                                 <label class="form-check-label" for="radioParkplätze2">
                                 2
                                 </label>
                              </div>
                           </div>
                           <div class="col">
                              <div class="form-check mb-2">
                                 <input class="form-check-input" type="radio" name="ParkplätzeForm" id="radioParkplätze3" />
                                 <label class="form-check-label" for="radioParkplätze3">
                                 3
                                 </label>
                              </div>
                           </div>
                           <div class="col">
                              <div class="form-check mb-2">
                                 <input class="form-check-input" type="radio" name="ParkplätzeForm" id="radioParkplätze4" />
                                 <label class="form-check-label" for="radioParkplätze4">
                                 4
                                 </label>
                              </div>
                           </div>
                           <div class="col">
                              <div class="form-check mb-2">
                                 <input class="form-check-input" type="radio" name="ParkplätzeForm" id="radioParkplätze5" />
                                 <label class="form-check-label" for="radioParkplätze5">
                                 5
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-----------------------------------------------------------------------Internet------------------------------------------------------------------------------------------------>
                     </br> </br> 
                     <div class="section" name="internet">
                        <p class="text-center"><strong>Internet:</strong></p>
                        <p style="display:none;" class="text-danger text-center">Bitte tätigen Sie eine Auswahl</p>
                        <div class="row justify-content-center text-center">
                           <div class="col">
                              <div class="form-check mb-2">
                                 <input class="form-check-input" type="radio" name="InternetForm" id="radioInternet1" />
                                 <label class="form-check-label" for="radioInternet1">
                                 1
                                 </label>
                              </div>
                           </div>
                           <div class="col">
                              <div class="form-check mb-2">
                                 <input class="form-check-input" type="radio" name="InternetForm" id="radioInternet2" />
                                 <label class="form-check-label" for="radioInternet2">
                                 2
                                 </label>
                              </div>
                           </div>
                           <div class="col">
                              <div class="form-check mb-2">
                                 <input class="form-check-input" type="radio" name="InternetForm" id="radioInternet3" />
                                 <label class="form-check-label" for="radioInternet3">
                                 3
                                 </label>
                              </div>
                           </div>
                           <div class="col">
                              <div class="form-check mb-2">
                                 <input class="form-check-input" type="radio" name="InternetForm" id="radioInternet4" />
                                 <label class="form-check-label" for="radioInternet4">
                                 4
                                 </label>
                              </div>
                           </div>
                           <div class="col">
                              <div class="form-check mb-2">
                                 <input class="form-check-input" type="radio" name="InternetForm" id="radioInternet5" />
                                 <label class="form-check-label" for="radioInternet5">
                                 5
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-----------------------------------------------------------------------Mensa------------------------------------------------------------------------------------------------>
                     </br> </br> 
                     <div class="section" name="canteen">
                        <p class="text-center"><strong>Mensa:</strong></p>
                        <p style="display:none;" class="text-danger text-center">Bitte tätigen Sie eine Auswahl</p>
                        <div class="row justify-content-center text-center">
                           <div class="col">
                              <div class="form-check mb-2">
                                 <input class="form-check-input" type="radio" name="MensaForm" id="radioMensa1" />
                                 <label class="form-check-label" for="radioMensa1">
                                 1
                                 </label>
                              </div>
                           </div>
                           <div class="col">
                              <div class="form-check mb-2">
                                 <input class="form-check-input" type="radio" name="MensaForm" id="radioMensa2" />
                                 <label class="form-check-label" for="radioMensa2">
                                 2
                                 </label>
                              </div>
                           </div>
                           <div class="col">
                              <div class="form-check mb-2">
                                 <input class="form-check-input" type="radio" name="MensaForm" id="radioMensa3" />
                                 <label class="form-check-label" for="radioMensa3">
                                 3
                                 </label>
                              </div>
                           </div>
                           <div class="col">
                              <div class="form-check mb-2">
                                 <input class="form-check-input" type="radio" name="MensaForm" id="radioMensa4" />
                                 <label class="form-check-label" for="radioMensa4">
                                 4
                                 </label>
                              </div>
                           </div>
                           <div class="col">
                              <div class="form-check mb-2">
                                 <input class="form-check-input" type="radio" name="MensaForm" id="radioMensa5" />
                                 <label class="form-check-label" for="radioMensa5">
                                 5
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
               <div class="card-footer text-end bg-dark">
                  <button type="button" onclick="printValues()" class="btn btn-primary">Absenden</button>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>