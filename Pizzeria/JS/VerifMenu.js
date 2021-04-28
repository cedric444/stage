var libelle = document.getElementById("pizzas");
var img = document.getElementById("idProduit");

libelle.addEventListener("click", afficherBase);
img.addEventListener("click", redirect);

function afficherImage(){
    var images = document.getElementsByClassName("images");
    if(images){
        for(let i=0; i<images.length; i++)
        {
            images[i].style.visibility = "visible";
            image = images[i];
            id = images[i].id;
            console.log(id);
            // var lien = "index.php?page=SelectionPizzas&idProduit="+id;
            // console.log(lien);
        }
    }
      
}

function afficherBase(){
    
    var pizza =  document.getElementById("pizzas");
    var apres= document.getElementById("apres")
    modif = document.createElement("div");
    modif.id = "base";
    modif.class= "titre centre";
    modif.textContent ="Base";
    pizza.parentNode.insertBefore(modif, apres);
    afficherImage();
}

// var bases = document.getElementsByClassName("images");
// var ids = document.getElementsByClassName("idProduit");
// for(let i=0; i<bases.length; i++)
// {
//     bases[i].addEventListener("click", (e)=>{
//     var id = ids[i].value;

//     redirect(id);
//     });        
// }

function redirect(id){
        // redirection
   
    window.location.href = "index.php?page=SelectionPizzas&idProduit="+id;
}