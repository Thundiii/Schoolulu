<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/personalBereich.css">

</head>

<?php
    if(!isset($_COOKIE['s_token'])) {
        header("Location: login.php");
    }

    include("header.php");
    include("sidebar.php");

?>


<h1>Schulbewertungen</h1>
<p>Noch keine Bewertungen abgegeben</p>
<br />

<h1>Ausbildungsbewertungen</h1>
<p>Noch keine Bewertungen abgegeben</p>

</div>

</body>

</html>
