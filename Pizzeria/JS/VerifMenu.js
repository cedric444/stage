var libelle = document.getElementById("pizzas");

libelle.addEventListener("click", (e)=> {
    var pizza = e.target;
    modif = document.createElement("div");
    modif.id= "base";
    modif.textContent = "Base";
    pizza.parentNode.appendChild(modif);
    
});
