function printValues() {

  var schoolid = document.getElementsByClassName("schoolid")[0].innerHTML;
  var token = document.getElementsByClassName("token")[0].innerHTML;

  // Iteriere über alle Sektionen
  let sections = document.getElementsByClassName('section');

  let incomplete = false;

  for (var i = 0; i < sections.length; i++) {
    
    let section = sections[i];
    console.log(section.getAttribute("name"));

      // Hole den Namen der Sektion
      let sectionName = section.getElementsByTagName("input")[0].getAttribute("name");

      // Hole die Auswahl innerhalb der Sektion
      let options = section.getElementsByTagName('input');
      let selectedValue;


      for (let j = 0; j < options.length; j++) {
          if (options[j].checked) {
              selectedValue = j + 1;
              section.getElementsByClassName("text-danger")[0].setAttribute("style", "display:none");
              break;
          }
      }

      if (selectedValue == undefined) {
          section.getElementsByClassName("text-danger")[0].removeAttribute("style", "display:none");
          incomplete = true;
      }


  }

  if(!incomplete) {
    
    let json = {};

    json["id"] = 0;

    for(let i = 0; i < sections.length; i++) {

      let section = sections[i];

      let name = section.getAttribute("name");
      let selectedValue;
      let options = section.getElementsByTagName('input');
      for (let j = 0; j < options.length; j++) {
        if (options[j].checked) {
            selectedValue = j + 1;
            section.getElementsByClassName("text-danger")[0].setAttribute("style", "display:none");
            break;
        }
      }

      json[name] = selectedValue;

    
    }

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "sendReview.php");

    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4) {
        
        console.log(xhr.status);
        console.log(xhr.responseText);

        if(xhr.responseText == 200) {
          window.location.replace("reviewSuccess.php?schoolId="+schoolid);
        } 

      }};

      let data = {
        sendReview: true,
        userId: token,
        schoolId: schoolid,
        dto: json
      };
      
      xhr.send(JSON.stringify(data));

  }

}