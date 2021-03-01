// ================ TEST INDEXDB ====================

// ===> Ouverture d'une demande à la base de données locale
var dbName = "eupec_NDF";
var db = '';

var openRequest = indexedDB.open(dbName, 1);

// // ===> Mise à jour
// openRequest.onupgradeneeded = function () {
//     db = openRequest.result;
//     CreateDB(db, 'users', 'idUser');
//     CreateDB(db, 'expenses', 'idExpense');
// };

// // ===> Si succès 
// openRequest.onsuccess = function () {
//     db = openRequest.result;
//     var listUser = OpenTransaction("users");
//     var listExpense = OpenTransaction("expenses");

//     var newUsers = [{
//             idUser: 1,
//             prenom: 'Jean',
//             nom: "Dupond",
//             role: 2
//         },
//         {
//             idUser: 2,
//             prenom: 'Alfred',
//             nom: "Batou",
//             role: 1
//         }
//     ];

//     var newExpenses = [{
//             idExpense: 1,
//             sum: 50,
//             idUser: 2
//         },
//         {
//             idExpense: 2,
//             sum: 299,
//             idUser: 1
//         }
//     ];

//     AddIndexDb(listUser, newUsers)
//     AddIndexDb(listExpense, newExpenses)

//     if (document.getElementById("data")) {
//         var dataUser = listUser.getAll();
//         var dataExpense = listExpense.getAll();

//         dataExpense.onsuccess = function () {
//             for (let i = 0; i < dataUser.result.length; i++) {

//                 document.getElementById("data").innerHTML += 'Client numéro ' + dataUser.result[i].idUser + ' - ' + dataUser.result[i].nom + ' ' + dataUser.result[i].prenom + '<br />';

//                 for (let j = 0; j < dataExpense.result.length; j++) {
//                     if (dataUser.result[i].idUser == dataExpense.result[j].idUser)
//                         document.getElementById("data").innerHTML += '- Dépense numéro ' + dataExpense.result[j].idExpense + ' d\'une valeur de ' + dataExpense.result[j].sum + '€<br />';
//                 }
//             }
//         }
//     }
// };

// ===> Crée une base de données locale
function CreateDB(db, name, id) {
    if (!db.objectStoreNames.contains(name))
        db.createObjectStore(name, {
            keyPath: id
        });
}

// ===> Ouvre une transaction et retourne ses objets
function OpenTransaction(name) {
    var transaction = db.transaction(name, 'readwrite');
    return transaction.objectStore(name);
}

// ===> Ajoute une liste d'objets dans une transaction déjà ouverte
function AddIndexDb(listData, dataToAdd) {
    for (let i = 0; i < dataToAdd.length; i++) {
        listData.put(dataToAdd[i]);
    }
}