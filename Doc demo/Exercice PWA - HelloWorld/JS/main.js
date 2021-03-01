// ============== ENREGISTREMENT SW ====================

if ('serviceWorker' in navigator)
  navigator.serviceWorker.register('serviceWorker.js');

// ============== VERIFICATION CONNEXION ===============

var toast = document.getElementById("updateApp");
var reconnected = 0; // permet de savoir si on a déjà été déconnecté (1:oui/0:non)
var connection = 1; // permet de connaître l'état de connexion (1:co/0:déco)

hostReachable(); 
checkButton(); 
checkClass();
setInterval(function() {
  hostReachable();
  checkButton();
  checkClass();
}, 2500);

// ===> Si on est connecté
function connected() {
  if (reconnected) {
  reconnected = 0;
  toast.style.backgroundColor = "lightgreen";
  toast.style.display = "flex";
  toast.textContent = 'Vous êtes à nouveau connecté.';
  setTimeout(function () { toast.style.display = "none"; }, 2000);
  }
  connection = 1;
}

// ===> Si on est déconnecté
function disconnected() {
  reconnected = 1;
  toast.style.backgroundColor = "lightcoral";
  toast.style.display = "flex";
  toast.textContent = 'Vous êtes actuellement en mode hors-ligne.';
  connection = 0;
}

// ===> Rend disponible ou indisponible le bouton d'un formulaire selon l'état de connexion
function checkButton() {
  if (document.getElementById("buttonOnlyOnline")) {
    if (!connection)
      document.getElementById("buttonOnlyOnline").disabled = true;
    else
      document.getElementById("buttonOnlyOnline").disabled = false;
  }
}

// ===> Affiche ou cache tous les éléments de la classe selon l'état de connexion
function checkClass() {
  var list = document.getElementsByClassName("classOnlyOnline");
  
  if (list) {
    if (!connection)
      for(let i = 0; i < list.length; i++ )
        list[i].hidden = true;
    else
      for(let i = 0; i < list.length; i++ )
        list[i].hidden = false;
  }
}

// ===> Vérifie l'état de connexion
function hostReachable() { 
  // Fonctionne sur ordinateur et mobile (Chrome + Firefox) mais méthode dépréciée...
  var xhr = new XMLHttpRequest();
  xhr.open( "HEAD", "//" + window.location.hostname + "/?rand=" + Math.floor((1 + Math.random()) * 0x10000), false);
  try {
    xhr.send();
    connected();
  } 
  catch (error) {
    disconnected();
  }
}