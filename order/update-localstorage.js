let orderAjax = new XMLHttpRequest();
//Denna skall alltså lägga till item in carten. med json datat
orderAjax.onreadystatechange = function () {
  //DETTA KÖRS NÄR RESPONSEN ÄR OK
  let cartProducts = new Array();

  if (this.readyState === 4 && this.status === 200) {
    let product = JSON.parse(this.responseText);

    product = {
      productid: product.productid,
      title: product.title,
      price: product.price,
      quantity: product.quantity,
    };

    cartProducts.push(product);

    localStorage.setItem("products", "Hejhej");
  }
  // JSON.stringify(cartProducts)
};
//STEG 1 EVENTET -> hämta id skicka till get-product.php
//STEG 1.5 -> backend skickar tillbaka json
//STEG 2 Ta hand om json och manipulera DOM, lägg till cartItems

let addToCartBtn = document.querySelector("#cart-btn");
addToCartBtn.addEventListener("click", function (e) {
  //Fånga upp ID från eventet, antingen via dataset eller id för att veta vilken produkkt det handlar
  //	let tID = event.target.previousSiblingElement.previousSiblingElement;
  //Skicka in idet till backend, få en respons med produkten tillbaka -> go to onreadystatechange
  orderAjax.open("GET", "../order/get-product.php?id=" + productid, true);
  orderAjax.send();
});

function ClearCart() {}

function showCart() {}
