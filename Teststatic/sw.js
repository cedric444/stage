//on importe les données du fichier albums.js
self.importScripts('teststatic/data/albums.js');

//Version du cache
const CACHE_VERSION = 1;
const CURRENT_CACHE = `ndf-${CACHE_VERSION}`;

//Liste des fichiers à mettre en cache
var cacheName = 'teststatic-v1';
var appShellFiles = [
    'test.html',
    'app.js',
    'CSS/style.css',
    'icons/korn.png',
    'data/albums.js'
];

//Liste des fichiers à mettre en cache à partir de l'app shell et du contenu
var albumsImage = [];
for (var i = 0; i < albums.length; i++) {
    albumsImages.push('data/IMG/' + albums[i].slug + '.jpg');
}

var contentToCache = appShellFiles.concat(albumsImages);

//initialisation du service worker lors de laquelle les fichiers de la liste précédente seront effectivement mis en cache
self.addEventListener('install', function (e) {
    console.log('[Service Worker] Install');
    e.waitUntil(
        caches.open(CURRENT_CACHE).then(function (cache) {
            console.log('[Service Worker] Caching all: app shell and content')
            return cache.addAll(contentToCache);
        })
    );
});

self.addEventListener("activate", e => {
    e.waitUntil(
        cache.keys().then(cacheNames => {
            return Promise.all(cacheNames.map(cacheName => {
                if (cacheName != CURRENT_CACHE) {
                    return cache.delete(cacheName);
                }
            })
            ); 
        })
    )
});

//on définit le gestionnaire de l'événement fetch du service worker afin qu'il récupère le contenu cache s'il est disponible
//pour offrir un fonctionnement hors connexion
self.addEventListener('fetch', function (e) {
    e.respondWith(
        caches.match(e.request).then(function (r) {
            console.log('[Service Worker] Fetching ressource: ' + e.request.url);
            return r || fetch(e.request).then(function (response) {
                return caches.open(cacheName).then(function (cache) {
                    console.log('[Service Worker] Caching new ressource: ' + e.request.url);
                    cache.put(e.request, response.clone());
                    return response;
                });
            });
        })
    );
});