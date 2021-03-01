// ============ APPEL AU SERVICE WORKER AVEC RELOAD =====================
// ===> https://github.com/dfabulich/service-worker-refresh-sample

// // ===> Affiche la DIV updateApp et attends le clic pour activer la mise à jour du Service
// // Worker via l'évènement "message" du Service Worker
// function showRefreshUI(registration) {
//     var toast = document.getElementById("updateApp");
//     toast.style.display = "flex";
//     toast.textContent = 'L\'application doit se mettre à jour, cliquez ici !';

//     toast.addEventListener('click', function () {
//         if (!registration.waiting) {
//             // registration.waiting doit être disponible avant d'appeler postMessage
//             return;
//         }

//         toast.disabled = true;
//         registration.waiting.postMessage('skipWaiting');
//     });
// };

// // ===> Attend et vérifie si un nouveau Service Worker est en production
// function onNewServiceWorker(registration, callback) {
//     if (registration.waiting) {
//         // le Service Worker est en attente d'activation. Cela peut arriver si plusieurs instances
//         // sont ouvertes et qu'une d'entres elles est actualisée
//         return callback();
//     }

//     // ==> Fonction d'écoute d'un nouveau Service Worker
//     function listenInstalledStateChange() {
//         registration.installing.addEventListener('statechange', function (event) {
//             if (event.target.state === 'installed') {
//                 // un nouveau Service Worker est disponible, on le sait grâce à l'évènement "statechange"
//                 callback();
//             }
//         });
//     };

//     // Si le nouvel enregistrement du Service Worker est en cours
//     if (registration.installing) {
//         return listenInstalledStateChange();
//     }

//     // Ajout d'un listener qui vérifie si une mise à jour du Service Worker a été trouvé
//     registration.addEventListener('updatefound', listenInstalledStateChange);
// }

// // ===> Ajout d'un listener si la page est actualisé, soit par l'utilisateur ou bien la fonction
// // showRefreshUI. Permet d'installer ou de mettre à jour le Service Worker
// window.addEventListener('load', function () {
//     var refreshing;

//     // Si le Service Worker est modifié lors d'un rafraichissement
//     navigator.serviceWorker.addEventListener('controllerchange', function (event) {

//         if (refreshing)
//             return; // prevent infinite refresh loop when you use "Update on Reload"

//         refreshing = true;
//         window.location.reload();
//     });

//     // Appelle le fichier du Service Worker lors de son enregistrement
//     navigator.serviceWorker.register('/serviceWorker.js').then(function (registration) {

//         if (!navigator.serviceWorker.controller) {
//             // Si la fenêtre de l'utilisateur n'est pas au premier plan alors
//             // retourne directement l'enregistrement
//             return;
//         }

//         registration.update();
//         onNewServiceWorker(registration, function () {
//             showRefreshUI(registration)
//         });
//     });

// });