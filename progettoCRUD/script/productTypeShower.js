let attivo = false;
let displayCarta = document.getElementById("tableCarta");
let displayBuste = document.getElementById("tableBuste");
let displayToner = document.getElementById("tableToner");

function showCarta() {
    if (attivo == false) {
        displayCarta.style.display = "block";
        attivo = true;
    } else if (attivo == true && displayCarta.style.display == "block") {
        displayCarta.style.display = "none";
        attivo = false;
    } else if (attivo == true && displayCarta.style.display == "none") {
        if (displayBuste.style.display == "block") {
            displayBuste.style.display = "none";
            displayCarta.style.display = "block";
            attivo = true;
        } else if (displayToner.style.display == "block") {
            displayToner.style.display = "none";
            displayCarta.style.display = "block";
            attivo = true;
        }
    }
}

function showBuste() {
    if (attivo == false) {
        displayBuste.style.display = "block";
        attivo = true;
    } else if (attivo == true && displayBuste.style.display == "block") {
        displayBuste.style.display = "none";
        attivo = false;
    } else if (attivo == true && displayBuste.style.display == "none") {
        if (displayCarta.style.display == "block") {
            displayCarta.style.display = "none";
            displayBuste.style.display = "block";
            attivo = true;
        } else if (displayToner.style.display == "block") {
            displayToner.style.display = "none";
            displayBuste.style.display = "block";
            attivo = true;
        }
    }
}

function showToner() {
    if (attivo == false) {
        displayToner.style.display = "block";
        attivo = true;
    } else if (attivo == true && displayToner.style.display == "block") {
        displayToner.style.display = "none";
        attivo = false;
    } else if (attivo == true && displayToner.style.display == "none") {
        if (displayCarta.style.display == "block") {
            displayCarta.style.display = "none";
            displayToner.style.display = "block";
            attivo = true;
        } else if (displayBuste.style.display == "block") {
            displayBuste.style.display = "none";
            displayToner.style.display = "block";
            attivo = true;
        }
    }
}
