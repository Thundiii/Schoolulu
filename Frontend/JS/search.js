$(document).ready(function() {
  var $searchInput = $('#search-input');
  var $searchResults = $('#search-results');
  var $resultsItems;
  var selectedIndex = -1;

// Funktion zum Laden der Daten
function loadSchoolData() {
  $.ajax({
    url: 'api.php',
    method: 'GET',
    dataType: 'json',
    success: function(data) {
      // Ergebnisse speichern
      $searchInput.data('school-data', data);
    },
    error: function() {
      console.error('Fehler beim Laden der JSON-Daten.');
    }
  });
}

// Daten beim Laden der Seite einmalig laden
loadSchoolData();

$searchInput.on('input', function() {
  var searchTerm = $(this).val();
  var schoolData = $searchInput.data('school-data');

  // Überprüfen, ob ein Suchbegriff vorhanden ist
  if (searchTerm.length > 0 && schoolData) {
    // Ergebnisse suchen, entweder nach Schulnamen oder Stadt suchen
    var results = schoolData.filter(function(schule) {
      return (
        schule.schoolname.toLowerCase().startsWith(searchTerm.toLowerCase()) ||
        schule.city.toLowerCase().startsWith(searchTerm.toLowerCase())
      );
    });

    // Suchergebnisse anzeigen
    $searchResults.empty();
    if (results.length > 0) {
      var maxResults = Math.min(results.length, 9); // Maximale Anzahl der anzuzeigenden Ergebnisse
      for (var i = 0; i < maxResults; i++) {
        var schule = results[i];
        $searchResults.append('<a href="school.php?id=' + schule.id + '" class="list-group-item list-group-item-action" data-school-id="' + schule.id + '">' + schule.schoolname + ' - ' + schule.city + '</a>');
      }
      $resultsItems = $searchResults.find('a');
      $searchResults.show();
    } else {
      $searchResults.hide();
    }
  } else {
    // Suchfeld ist leer oder Daten wurden noch nicht geladen, Ergebnisse löschen
    $searchResults.empty().hide();
  }

  // Zurücksetzen des ausgewählten Index
  selectedIndex = -1;
  $resultsItems.removeClass('selected');
});

  $searchInput.on('keydown', function(e) {
    if (e.key === 'ArrowUp') {
      // Pfeiltaste nach oben gedrückt
      e.preventDefault();
      if (selectedIndex > 0) {
        selectedIndex--;
      } else {
        selectedIndex = $resultsItems.length - 1;
      }
      $resultsItems.removeClass('selected');
      $resultsItems.eq(selectedIndex).addClass('selected');
    } else if (e.key === 'ArrowDown') {
      // Pfeiltaste nach unten gedrückt
      e.preventDefault();
      if (selectedIndex < $resultsItems.length - 1) {
        selectedIndex++;
      } else {
        selectedIndex = 0;
      }
      $resultsItems.removeClass('selected');
      $resultsItems.eq(selectedIndex).addClass('selected');
    } else if (e.key === 'Enter') {
      // Enter-Taste gedrückt
      var $selectedItem = $resultsItems.eq(selectedIndex);
      if ($selectedItem.length > 0) {
        var schoolId = $selectedItem.data('school-id');
        window.location.href = 'school.php?id=' + schoolId;
      }
    }
  });

  // Klickereignis für die Ergebnisliste
  $searchResults.on('click', 'a', function() {
    var schoolId = $(this).data('school-id');
    window.location.href = 'school.php?id=' + schoolId;
  });
});