//mostra e nasconde il form di creazione utente
var creaButton = document.getElementById('crea');
var crea = document.querySelector('.crea');
let cliccatoCrea = false;
creaButton.addEventListener('click', function () {

    if (cliccatoCrea) {
        crea.style.display = 'none';
        cliccatoCrea = false;
    } else {
        crea.style.display = 'block';
        cliccatoCrea = true;
    }
});


//modifica username 
const td_id = document.querySelector(".td-id");
const td_username = document.querySelector(".td-username");
const td_nome = document.querySelector(".td-nome");
const td_cognome = document.querySelector(".td-cognome");
const td_dob = document.querySelector(".td-dob");

//creazione form di modifica e post dei nuovi elementi
if (td_username == null) {

} else {
    let testo = td_id.value;
    //recuperare bottone "modifica"
    const modifica = document.getElementById("modifica");
    //crea un nuovo form che modifica la struttura del db.
    modifica.addEventListener("click", () => {
        let input = document.createElement("input");
        input.setAttribute("value", testo);
        td_username.textContent = "";
        input.setAttribute("readonly", true);
        input.setAttribute("hidden", true);
        let newValue = document.createElement("input");
        newValue.setAttribute("value", "");
        let form = document.createElement("form");
        form.setAttribute("action", "../php/modUtenti.php");
        form.setAttribute("method", "POST");
        td_username.appendChild(form);
        form.appendChild(input);
        form.appendChild(newValue);
        let submit = document.createElement("input");
        form.appendChild(submit);
        submit.setAttribute("type", "submit");
        input.setAttribute("name", "vecchioUsername");
        newValue.setAttribute("name", "nuovoUsername");
    })
}

if (td_nome == null) {

} else {
    let testo = td_nome.textContent;

    //recuperare bottone "modifica"
    const modifica = document.getElementById("modifica");
    //crea un nuovo form che modifica la struttura del db.
    modifica.addEventListener("click", () => {
        let input = document.createElement("input");
        input.setAttribute("value", testo);
        td_nome.textContent = "";
        input.setAttribute("readonly", true);
        input.setAttribute("hidden", true);
        let newValue = document.createElement("input");
        newValue.setAttribute("value", "");
        let form = document.createElement("form");
        form.setAttribute("action", "../php/modUtenti.php");
        form.setAttribute("method", "POST");
        td_nome.appendChild(form);
        form.appendChild(input);
        form.appendChild(newValue);
        let submit = document.createElement("input");
        form.appendChild(submit);
        submit.setAttribute("type", "submit");
        input.setAttribute("name", "vecchioNome");
        newValue.setAttribute("name", "nuovoNome");
    })
}

if (td_cognome == null) {

} else {
    let testo = td_cognome.textContent;

    //recuperare bottone "modifica"
    const modifica = document.getElementById("modifica");
    //crea un nuovo form che modifica la struttura del db.
    modifica.addEventListener("click", () => {
        let input = document.createElement("input");
        input.setAttribute("value", testo);
        td_cognome.textContent = "";
        input.setAttribute("readonly", true);
        input.setAttribute("hidden", true);
        let newValue = document.createElement("input");
        newValue.setAttribute("value", "");
        let form = document.createElement("form");
        form.setAttribute("action", "../php/modUtenti.php");
        form.setAttribute("method", "POST");
        td_cognome.appendChild(form);
        form.appendChild(input);
        form.appendChild(newValue);
        let submit = document.createElement("input");
        form.appendChild(submit);
        submit.setAttribute("type", "submit");
        input.setAttribute("name", "vecchioCognome");
        newValue.setAttribute("name", "nuovoCognome");
    })
}

if (td_cognome == null) {

} else {
    let testo = td_cognome.textContent;

    //recuperare bottone "modifica"
    const modifica = document.getElementById("modifica");
    //crea un nuovo form che modifica la struttura del db.
    modifica.addEventListener("click", () => {
        let input = document.createElement("input");
        input.setAttribute("value", testo);
        td_cognome.textContent = "";
        input.setAttribute("readonly", true);
        input.setAttribute("hidden", true);
        let newValue = document.createElement("input");
        newValue.setAttribute("value", "");
        let form = document.createElement("form");
        form.setAttribute("action", "../php/modUtenti.php");
        form.setAttribute("method", "POST");
        td_cognome.appendChild(form);
        form.appendChild(input);
        form.appendChild(newValue);
        let submit = document.createElement("input");
        form.appendChild(submit);
        submit.setAttribute("type", "submit");
        input.setAttribute("name", "vecchioCognome");
        newValue.setAttribute("name", "nuovoCognome");
    })
}





/*
var modificaButton = document.getElementById('modifica');
var modifica = document.querySelector('.modifica');
let cliccatoButton = false;
modificaButton.addEventListener('click', function () {

    if (cliccatoModifica) {
        modifica.style.display = 'none';
        cliccatoModifica = false;
    } else {
        modifica.style.display = 'block';
        cliccatoModifica = true;
    }
});
console.log(modificaBottone);
*/



