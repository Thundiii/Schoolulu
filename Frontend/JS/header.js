var active = false;

function buttonClick(e) {
    
    if(!active) {
        active = true;
        document.getElementById("flexiMexi").classList.remove("flex-row-reverse");

    } else {
        active = false;
        document.getElementById("flexiMexi").classList.add("flex-row-reverse");
    }

}