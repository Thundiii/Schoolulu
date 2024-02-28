document.addEventListener('DOMContentLoaded', function() {
    // Finde alle Elemente mit der Klasse "ratings"
    var ratingContainers = document.getElementsByClassName('ratings');
  
    // Iteriere über jedes Container-Element
    Array.prototype.forEach.call(ratingContainers, function(container) {
      // Finde das Element mit der Klasse "rating" innerhalb des Containers
      var ratingElement = container.getElementsByClassName('rating')[0];
  
      // Hole den Bewertungswert aus dem "data-rating" Attribut
      var rating = parseFloat(ratingElement.getAttribute('data-rating'));
  
      // Runde den Bewertungswert auf eine ganze Zahl
      var roundedRating = Math.round(rating);
  
      // Erzeuge den HTML-Code für die gefüllten Sterne
      var filledStars = '★'.repeat(roundedRating);
  
      // Erzeuge den HTML-Code für die leeren Sterne
      var emptyStars = '☆'.repeat(5 - roundedRating);
  
      // Setze den HTML-Code in das Container-Element
      ratingElement.innerHTML = filledStars + emptyStars;
    });
  });
  