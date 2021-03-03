

if ("serviceWorker" in navigator)
{
    navigator.serviceWorker.register("./Sw.js").then(registration => {
        // On a réussi ! Youpi !
        console.log(
          "App: Achievement unlocked."
        );
    });
    console.log("toto");
}

// var button= document.getElementById("notifications");
// button.addEventListener('click', function(e) {
//   Notification.requestPermission().then(function(result) {
//     if (result=== 'granted') {
//       randomNotification();
//     }
//   });
// });

function randomNotification(){
  var nom='';
  fetch('index.php?page=AlbumsApi').then(function(response) {
    response.text().then(function(text) {
      nom.textContent=text;
    });
  });
  
}