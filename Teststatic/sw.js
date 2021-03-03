//on importe les données du fichier albums.js
self.importScripts('/data/albums.js');


//Liste des fichiers à mettre en cache
var cacheName= 'teststatic-v1';
var appShellFiles = [
    'teststatic/test.html',
    'teststatic/app.js',
    'teststatic/CSS/style.css',
    'teststatic/icons/korn.png',
    'teststatic/data/albums.js'
];

//Liste des fichiers à mettre en cache à partir de l'app shell et du contenu
var albumsImage= [];
for (var i=0; i<albums.length; i++)
{
    albumsImages.push('data/IMG/'+ albums[i].slug+'.jpg');
}

var contentToCache =appShellFiles.concat(albumsImages);

//initialisation du service worker lors de laquelle les fichiers de la liste précédente seront effectivement mis en cache
self.addEventListener('install', function(e) {
    console.log('[Service Worker] Install');
    e.waitUntil(
        caches.open(caheName).then(function(cache) {
            console.log('[Service Worker] Caching all: app shell and content')
            return cache.addAll(contentToCache);
        })
    );
});

//on définit le gestionnaire de l'événement fetch du service worker afin qu'il récupère le contenu cache s'il est disponible
//pour offrir un fonctionnement hors connexion
self.addEventListener('fetch', function(e) {
    e.respondWith(
        caches.match(e.request).then(function(r) {
            console.log('[SErvice Worker] Fetching ressource: '+e.request.url);
            return r || fetch(e.request).then(function(response) {
                return caches.open(cacheName).then(function(cache) {
                    console.log('[Service Worker] Caching new ressource: '+e.request.url);
                    cache.put(e.request, response.clone());
                    return response;
                });
            });
        })
    );
});