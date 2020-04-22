let output = new Array();
let ajax = new XMLHttpRequest();
//Denna skall alltså lägga till item in carten. med json datat
ajax.onreadystatechange = function () {
  //DETTA KÖRS NÄR RESPONSEN ÄR OK
  if (this.readyState === 4 && this.status === 200) {
    let productId = JSON.parse(this.responseText);
    let productTitle = new Array();
    localStorage.setItem("products", "MARIA!!!!");
  }
};

//STEG 1 EVENTET -> hämta id skicka till get-product.php
//STEG 1.5 -> backend skickar tillbaka json
//STEG 2 Ta hand om json och manipulera DOM, lägg till cartItems

let addToCartBtn = document.querySelector("#cart-btn");
addToCartBtn.addEventListener("click", function (e) {
  //Fånga upp ID från eventet, antingen via dataset eller id för att veta vilken produkkt det handlar
  //let tID = event.target.previousSiblingElement.previousSiblingElement.
  //Skicka in idet till backend, få en respons med produkten tillbaka -> go to onreadystatechange
  ajax.open("GET", "get-product.php/id=" + id, true);
  ajax.send();
});

function ClearCart() {}

function showCart() {}
