var photoIndex = 1;
afficherPhotos(photoIndex);

var precedent = document.getElementById("precedent");
precedent.addEventListener("click", e=>{
    photoSuivante(-1);
});

var suivant = document.getElementById("suivant");
suivant.addEventListener("click", e=>{
    photoSuivante(1);
});

function photoSuivante(n){
    afficherPhotos(photoIndex += n);
}

function photoActuelle(n){
    afficherPhotos(photoIndex = n);
}

function afficherPhotos(n){
    var i;
    var photos = document.getElementsByClassName("photoPizza");
    if(n<photos.length)
    {
        photIndex = 1;
    } 
    if(n<1)
    {
        photoIndex = photoIndex.length;
    }
    for(i=0; i<photoIndex.length; i++)
    {
        photos[i].style.display = "none";
    }
    // photos[photoIndex-1].style.display = "block";
}


