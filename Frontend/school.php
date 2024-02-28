<?php
if (!isset($_GET['id'])) {
    header("Location: index.php");
    die();
}

$id = $_GET['id'];

// Get school from the JSON:
$url = 'http://thundiii.de:3033/api/school/get';
$data = array('schoolid' => $id);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

if ($httpcode != 200) {
    echo("Ein Fehler ist aufgetreten. Bitte versuchen Sie es erneut");
    die();
}

$jsonData = json_decode($response, true);
$schoolName = $jsonData['schoolname'];
$schoolLogo = $jsonData['logo'];
?>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $jsonData['schoolname']; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="CSS/stylesheet_school.css">
</head>
<body>

<?php
include("header.php");

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

if ($httpcode != 200) {
    echo("Ein Fehler ist aufgetreten. Bitte versuchen Sie es erneut");
    die();
}

$jsonData = json_decode($response, true);
$schoolId = $jsonData['id'];
$schoolName = $jsonData['schoolname'];
$schoolLogo = $jsonData['logo'];

// Get reviews for the school:
$reviewUrl = 'http://thundiii.de:3033/api/review/school?schoolId=' . $id;

$chReview = curl_init();
curl_setopt($chReview, CURLOPT_URL, $reviewUrl);
curl_setopt($chReview, CURLOPT_RETURNTRANSFER, true);

$reviewResponse = curl_exec($chReview);
$reviewHttpCode = curl_getinfo($chReview, CURLINFO_HTTP_CODE);

// Fehler
if ($reviewHttpCode != 200) {
    $error = curl_error($chReview);
    $errorCode = curl_errno($chReview);
    echo("Ein Fehler ist bei der Bewertungsabfrage aufgetreten. Fehlercode: $errorCode, Fehlermeldung: $error");
} 

// Eigenschaften holen
else {
    $reviews = json_decode($reviewResponse, true);

    // Calculate average ratings for each property:
    $properties = ['competence', 'atmosphere', 'roomEquipment', 'equality', 'mateHandling', 'accessibility', 'transportConnections', 'parkingSpot', 'internet', 'toilets', 'canteen'];

    $propertiesLabels = [
        'competence' => 'Kompetenz',
        'atmosphere' => 'Atmosphäre',
        'roomEquipment' => 'Raumausstattung',
        'equality' => 'Gleichberechtigung',
        'mateHandling' => 'Umgang mit Mitschülern',
        'accessibility' => 'Barrierefreiheit',
        'transportConnections' => 'Verkehrsanbindung',
        'parkingSpot' => 'Parkplätze',
        'internet' => 'Internet',
        'toilets' => 'Toiletten',
        'canteen' => 'Mensa'
    ];

    echo "<div class='container' style='margin-top: 30px;'>";
    echo "<div class='row' style='background-color:#333; padding:30px; border-radius: 18px'>";

// Berechnung für Bewertung
$totalRating = 0;
$numReviews = 0;

foreach ($properties as $property) {
    $propertyTotalRating = 0;
    $propertyNumReviews = 0;

    foreach ($reviews as $review) {
        $propertyTotalRating += intval($review[$property]);
        $propertyNumReviews++;
    }

    $averageRating = ($propertyNumReviews > 0) ? $propertyTotalRating / $propertyNumReviews : 0;

    $totalRating += $averageRating;
    $numReviews++;
}

$overallAverageRating = ($numReviews > 0) ? $totalRating / $numReviews : 0;
$roundedRating = round($overallAverageRating, 1);
?>

<div class="container">
    <div class="logo-container d-flex justify-content-between">
        <div>
        <img class="logo" src="<?php echo $schoolLogo; ?>" alt="Schullogo">
            <div class="school-info">
                <h3>
                    <?php echo $jsonData['schoolname']; ?>
                    <div class='total-rating'>
                        <span class="rating-value text-white">
                            Bewertungen:
                            <?php
                           
                            echo(count($reviews) .
                            "<div class='stars'>");
                            for ($i = 1; $i <= $roundedRating; $i++) {
                                echo '<i class="fas fa-star"></i>';
                            }
                    
                            if ($roundedRating != floor($roundedRating)) {
                                if (($roundedRating - floor($roundedRating)) >= 0.8) {
                                    echo '<i class="fas fa-star"></i>';
                                } else if (($roundedRating - floor($roundedRating)) >= 0.3) {
                                    echo '<i class="fas fa-star-half-alt"></i>';
                                } else {
                                    echo '<i class="far fa-star"></i>';
                                }
                            }
                            
                            for ($i = ceil($roundedRating); $i < 5; $i++) {
                                echo '<i class="far fa-star"></i>';
                            }
                            echo ' ' . $roundedRating,' / 5';
                            ?>
                        
                </h3>
                <p class="school-address text-white">
                    <?php echo $jsonData['street'] . ' ' . $jsonData['houseNumber']; ?><br>
                    <?php echo $jsonData['zipCode'] . ' ' . $jsonData['city']; ?>
                </p>
            </div>
        </div>
        <a href="review.php?schoolId=<?php echo $schoolId; ?>" class="btn btn-primary text-end float-right">Bewertung abgeben</a>
    </div>
</div>

<?php
   
    foreach ($properties as $property) {
        $totalRating = 0;
        $numReviews = 0;

        foreach ($reviews as $review) {
            $totalRating += intval($review[$property]);
            $numReviews++;
        }

        $averageRating = ($numReviews > 0) ? $totalRating / $numReviews : 0;
        $roundedRating = round($averageRating, 1);

        echo "<div class='col-md-4'>";
        echo "<div class='rating-container'>";
        echo "<h5 class='rating-title text-white'>" . $propertiesLabels[$property] . "</h5>";
        echo "<div class='rating'>";
        echo "<div class='stars'>";

        

        for ($i = 1; $i <= $averageRating; $i++) {
            echo '<i class="fas fa-star"></i>';
        }

        if ($averageRating != floor($averageRating)) {
            if (($averageRating - floor($averageRating)) >= 0.8) {
                echo '<i class="fas fa-star"></i>';
            } else if (($averageRating - floor($averageRating)) >= 0.3) {
                echo '<i class="fas fa-star-half-alt"></i>';
            } else {
                echo '<i class="far fa-star"></i>';
            }
        }
        
        for ($i = ceil($averageRating); $i < 5; $i++) {
            echo '<i class="far fa-star"></i>';
        }
        

        echo "</div>";
        echo "</div>";
        echo "<p class='rating-value text-white'>Bewertung: $roundedRating</p>";
        echo "</div>";
        echo "</div>";
    }
}
// Close cURL handles:
curl_close($ch);
curl_close($chReview);
?>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

<footer>
      <p>&copy; 2023 Schoolulu. Alle Rechte vorbehalten.</p>
    </footer>
</html>
