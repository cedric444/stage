console.log("toto");

var cacheName = 'v1';

this.addEventListener("install", function(event) {
    event.waitUntil(
        caches.open(cacheName).then(function(cache) {
            return cache.addAll([
                './index.php',
            ]);
        })
    );
});