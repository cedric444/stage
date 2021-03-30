var template= "<div>\n\
    <img src='data/IMG/SLUG.png' alt='NAME'>\n\
    <h3>#POS. NAME</h3>\n\
    <div><span>Nom:</span> <strong>NAME</strong></div>\n\
    <div><span>Année</span><strong>YEAR</strong></div>\n\
    </div>";



//On enregistre le service worker
if ('serviceWorker' in navigator)
{
    navigator.serviceWorker.register('/stage/teststatic/sw.js');
};

var button= document.getElementById("notifications");
button.addEventListener('click', (e)=>{
    Notification.requestPermission().then(function(result) {
        if(result==='granted') {
            randomNotification();
        }
    });
});

var content= '';
for (var i=0; i<albums.length; i++)
{
    var entry= template.replace(/POS/g, (i+1))
    .replace(/SLUG/g, albums[i].slug)
    .replace(/NAME/g, albums[i].name)
    .replace(/YEAR/g, albums[i].year);
    entry = entry.replace('<a href=\'http:///\'></a>','-');
    content += entry;
};
document.getElementById('content').innerHTML= content;

function randomNotification(){
    var randomItem= Math.floor(Math.random()*albums.length);
    var notifTitle= albums[randomItem].name;
    var notifBody = albums[randomItem].name + '('+albums[randomItem].year+')';
    var notifImage= 'data/IMG/'+ albums[randomItem].slug+ '.jpg';
    var options= {
        body: notifBody,
        icon: notifImage
    }
    var notif= new Notification(notifTitle, options);
    setTimeout(randomNotification, 30000);
}