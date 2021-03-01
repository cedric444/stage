// ============ SERVICE WORKER AVEC RELOAD =====================
// ===> https://github.com/dfabulich/service-worker-refresh-sample

// // ===> Sert à mettre à jour le service worker pour du contenu statique (HTML, CSS etc)
// // Il suffit d'entrer un nom différent mais il faut un nom personalisé pour le reconnaître
// const v = "ndf_v42"; 

// // ===> Install : installe les données du tableau dans le cache à la première exécution si le 
// // cache nommé selon la constante V n'existe pas.
// self.addEventListener('install', e => e.waitUntil(
// caches.open(v).then(cache => cache.addAll([
//   '/',
//   '/CSS/style.css', // style
//   '/JS/main.js', // JS
//   '/JS/manageSw.js',
//   '/JS/indexDB.js',
//   '/images/eupec.gif', // img
//   'images/favicon.ico'
// ]))
// ));

// // ===> Fetch : intercepte la connexion au serveur et vérifie qu'une version en cache existe
// // pour l'afficher en priorité, sinon ne fait rien.
// self.addEventListener('fetch', e => {
//   // console.log('fetch', e.request);
//   e.respondWith(
//     caches.match(e.request).then(cachedResponse =>
//       cachedResponse || fetch(e.request)
//     )
//   );
// });

// // ===> Activate : lorsque le Service Worker est activé, vérifie la version du cache selon la 
// // constante V, et supprime les caches qui ne correspondent pas (problème avec Firefox)
// self.addEventListener('activate', e => {
//   e.waitUntil(caches.keys().then(keys => {
//     return Promise.all(keys.map(key => {
//       if (key != v) return caches.delete(key);
//     }));
//   }));
// });

// // ===> Message : permet d'attendre ou de recevoir un "message" du Service Worker (permet la mise
// // à jour du cache grâce à la fonction showRefreshUI)
// self.addEventListener('message', e => {
//   if (e.data === 'skipWaiting') {
//     skipWaiting();
//   }
// });

// ============== SERVICE WORKER NETWORK FIRST CACHE SECOND ==============
// ===> https://gist.github.com/JMPerez

// le numéro de version est modifié à chaque nouveau déploiement de fichers
const CACHE_VERSION = 1;
const CURRENT_CACHE = `ndf-${CACHE_VERSION}`;

// toutes les routes et fichiers qu'on veut sauvegarder en cache
const cacheFiles = [
  'index.php',
  '/PHP/',
  '/CSS/',
  '/JS/',
  '/images/'
];

// A l'activation : on supprime les anciens caches
self.addEventListener('activate', evt =>
  evt.waitUntil(
    caches.keys().then(cacheNames => {
      return Promise.all(cacheNames.map(cacheName => {
          if (cacheName !== CURRENT_CACHE)
            return caches.delete(cacheName);
        })
      );
    })
  )
);

// A l'installation : on télécharge les routes et fichers
self.addEventListener('install', evt =>
  evt.waitUntil(
    caches.open(CURRENT_CACHE).then(cache => {
      return cache.addAll(cacheFiles);
    })
  )
);

// A l'interception (le fetch) : on charge les données en ligne
const fromNetwork = (request, timeout) =>
  new Promise((fulfill, reject) => {
    const timeoutId = setTimeout(reject, timeout);
    
    fetch(request).then(response => {
      clearTimeout(timeoutId);
      fulfill(response);
      update(request);
    }, reject);
  });

// A l'interception (le fetch) : on charge les données hors-ligne
const fromCache = request =>
  caches.open(CURRENT_CACHE).then(cache =>
    cache.match(request).then(matching => matching || cache.match('/'))
  );

// Mets en cache la page actuelle
const update = request =>
  caches.open(CURRENT_CACHE).then(cache =>
    fetch(request).then(response => cache.put(request, response))
  );

// Si le réseau est disponible, on fait appel au réseau sinon on utilise
// le contenu hors-ligne
self.addEventListener('fetch', evt => {
  evt.respondWith(
    fromNetwork(evt.request, 10000).catch(
      () => fromCache(evt.request))
  );
  evt.waitUntil(
    update(evt.request)
    );
});