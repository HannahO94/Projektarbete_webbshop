let orderAjax = new XMLHttpRequest();
orderAjax.open("GET", "../order/get-product.php", true);
orderAjax.send();
//Denna skall alltså lägga till item in carten. med json datat
orderAjax.onreadystatechange = function () {
  //DETTA KÖRS NÄR RESPONSEN ÄR OK
  let cartProducts = new Array();
  if (this.readyState === 4 && this.status === 200) {
    let product = JSON.parse(this.responseText);

    product = {
      title: product.title,
      price: product.price,
      quantity: product.quantity,
    };
    cartProducts.push(product);

    // let productTitle = new Array();
    // localStorage.setItem("products", "MARIA!!!!");
    localStorage.setItem("products", JSON.stringify(cartProducts));
  }
};
//STEG 1 EVENTET -> hämta id skicka till get-product.php
//STEG 1.5 -> backend skickar tillbaka json
//STEG 2 Ta hand om json och manipulera DOM, lägg till cartItems

// let addToCartBtn = document.querySelector("#cart-btn");
// });
// addToCartBtn.addEventListener("click", function (e) {
//Fånga upp ID från eventet, antingen via dataset eller id för att veta vilken produkkt det handlar
//	let tID = event.target.previousSiblingElement.previousSiblingElement;
//Skicka in idet till backend, få en respons med produkten tillbaka -> go to onreadystatechange

function ClearCart() {}

function showCart() {}
