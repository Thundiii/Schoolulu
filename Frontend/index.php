<!DOCTYPE html>
<html>
<head>
  <title>Schoolulu | Startseite</title>
	<link rel="icon" type="image/vnd.icon" href="https://thundiii.de/Schoolulu/fav.ico">  
  <link rel="stylesheet" type="text/css" href="CSS/stylesheet_main.css">
</head>
<body>
  <div class="wrapper">
    <?php
      include("header.php");
    ?>

    <div id="container">
    <div class="content">
      <div class="live-search">
        <h1 class="fw-bold mb-2 text-uppercase text-white mt-4 mb-4">Suchen Sie Ihre Bildungsstätte</h1>  
        <input type="text" id="search-input" placeholder="Schule suchen...">
        <div class="list-group">
          <div id="search-results" style="display: none;"></div>
        </div>
      </div>   
      
    </div>
</div>

    <footer>
      <p>&copy; 2023 Schoolulu. Alle Rechte vorbehalten.</p>
    </footer>
  </div>
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script src="JS/search.js"></script>
</body>
</html>
