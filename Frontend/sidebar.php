<link rel="stylesheet" href="CSS/personalBereich.css">
<body>
    <div class="sidebar bg-dark navbar-dark">
    <div class="navbar-nav">
        <ul>

<?php

$b = explode('/', $_SERVER["SCRIPT_NAME"]);
$file = $b[count($b) - 1];
 
if($file == "mine.php") {
    echo('<li><a class="navbar-brand nav-item nav-link active" href="mine.php">Meine Bewertungen</a></li>');
} else {
    echo('<li><a class="navbar-brand nav-item nav-link" href="mine.php">Meine Bewertungen</a></li>');
}

if($file == "test.php") {
    echo('<li><a class="navbar-brand nav-item nav-link active" href="test.php">Meine Tests</a></li>');
} else {
    echo('<li><a class="navbar-brand nav-item nav-link" href="test.php">Meine Tests</a></li>');   
}

if($file == "settings.php") {
    echo('<li><a class="navbar-brand nav-item nav-link active" href="settings.php">Einstellungen</a></li>');
} else {
    echo('<li><a class="navbar-brand nav-item nav-link" href="settings.php">Einstellungen</a></li>');   
}

?>
        </ul>
    </div>
    </div>

    <div class="content">