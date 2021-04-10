/**
 * Vérifie la validité de la saisie dans un input et change le style en conséquence
 * @param {élément de type input} input 
 */
 function updateValidity(input) {
    isValid = valideInput(input);
    impactValidity(input, isValid);
    checkAllValidity();
}

/**
 * Vérifie la validité de la saisie dans un input
 * Renvoi vrai si la saisie est valide, faux si elle n'est pas valide, 0 si le champ n'est pas rempli
 * @param {élément de type input} input 
 */
 function valideInput(input) {
    isValid = input.checkValidity();
    if (!isValid && input.value == "" && input.required) {
        isValid = 0;
    }
    return isValid;
}

/**
 * Affiche le message d'erreur, change les couleurs et affiche les coches
 * @param {élément de type input} input 
 * @param {*} isValid 
 */
 function impactValidity(input, isValid) {
    let invalide = input.previousElementSibling.textContent;
    requis = invalide.substr(0, invalide.length - 1) + " est requis";
    invalide = invalide.substr(0, invalide.length ) + " est invalide";
    switch (isValid) {
        case true:
            erreur.innerHTML = erreur.innerHTML.replace("<br>" + invalide, "");
            erreur.innerHTML = erreur.innerHTML.replace("<br>" + requis, "");
            break;
        case 0:
            erreur.innerHTML = erreur.innerHTML.replace("<br>" + invalide, "");
            if (erreur.innerHTML.indexOf(requis) == -1)
                erreur.innerHTML += "<br>" + requis;
            break;
        case false:
            erreur.innerHTML = erreur.innerHTML.replace("<br>" + requis, "");
            if (erreur.innerHTML.indexOf(invalide) == -1)
                erreur.innerHTML += "<br>" + invalide;
            break;
    }

}

/**
 * Activation du bouton de formulaire
 * Vérification de tous les champs
 */
 function checkAllValidity() {
    var pasErreur = true;
    i = 0;
    j = 0;
    // on vérifie les listeInput un à un
    while (pasErreur && i < listeInput.length) {
        pasErreur = valideInput(listeInput[i]);
        i++;
    }
    while (listeSelect != null && pasErreur && j < listeSelect.length) {
        pasErreur = (listeSelect[j].value != "")
        j++
    }
    // On teste qu'aucun message d'erreur n'est géré par un autre script
    if (pasErreur && erreur.innerHTML == "") {
        valider.disabled = false;
    } else {
        valider.disabled = true;
    }
}

var listeInput = document.querySelectorAll("input");
var listeSelect = document.querySelectorAll('select');
var valider = document.querySelector('#submit');
var erreur = document.querySelector('.erreur');

for (let i = 0; i < listeInput.length; i++) {
    listeInput[i].addEventListener("input", function (event) {
        updateValidity(event.target);
    });
}

for (let j = 0; j < listeSelect.length; j++) {
    listeSelect[j].addEventListener("change", function (event) {
        isValid = (event.target.value != "");
        impactValidity(event.target, isValid);
        checkAllValidity();
    });
}