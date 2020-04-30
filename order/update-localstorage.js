//*******Lägger till produkter i localstorage*********** */

let cartBtn = document.querySelectorAll(".cart-btn");
let addToCartBtn = document.querySelectorAll(".add-to-cart");
let productArray = [];
let arrayToSend;

if (JSON.parse(localStorage.getItem("products")) !== null) {
  arrayToSend = JSON.parse(localStorage.getItem("products"));
} else {
  arrayToSend = [];
}

//Loopar över alla knappar med klassen cart-btn och lägger till eventlisteners
for (let j = 0; j < cartBtn.length; j++) {
  let product = cartBtn[j];

  cartBtn[j].addEventListener("click", function (e) {
    product = cartBtn[j];
    //Kollar på knappens parentElement som är själva produktkortet/diven som produkten ligger i
    let parent = product.parentElement;
    let prodTitle 
    let prodPrice
    let prodQuantity
    let prodId
    let prodCartQuantity
    let prodOutletPrice

    //loopar över alla barn och pushar in dem i en array
    // for (let i = 0; i < parent.children.length; i++) {
    //   productcard = parent.children[i];
    //   productArray.push(productcard);
    // }

    prodTitle = parent.querySelector(".product_title")
    prodPrice = parent.querySelector(".hidden-price")
    prodQuantity = parent.querySelector(".hidden-quantity")
    prodId = parent.querySelector(".hidden-productid")
    prodCartQuantity = parent.querySelector(".cartQty")
    prodOutletPrice = parent.querySelector(".hidden-outletPrice")
 
    if (prodOutletPrice !== null){

      product = {
        cartQty: prodCartQuantity.value,
        title: prodTitle.textContent,
        price: prodPrice.textContent,
        outletprice: prodOutletPrice.textContent,
        quantity: prodQuantity.textContent,
        productid: prodId.textContent,
      };
    }else {
      product = {
        cartQty: prodCartQuantity.value,
        title: prodTitle.textContent,
        price: prodPrice.textContent,
        quantity: prodQuantity.textContent,
        productid: prodId.textContent,

      };
    }
    // console.log(parseInt(product.cartQty))
    // console.log(parseInt(product.quantity))
    if (parseInt(product.cartQty) > parseInt(product.quantity)){
      alert("Det går inte att lägga till fler produkter än vad som finns i lager")
      productArray = [];
      return false
    }
   
   let sum = 0;
   for (let j = 0; j < arrayToSend.length; j++){
    //  console.log(arrayToSend[j])
    //  console.log(arrayToSend[j].productid)
    //  console.log(product.productid)
     if (arrayToSend[j].productid == product.productid){
        alert('Produkten finns redan i varukorgen, ändra antal där')
        productArray = [];
        return false
        // let cartQ = arrayToSend[j].cartQty;
        // let productQ = product.cartQty
        // console.log(parseInt(cartQ))
        // console.log(parseInt(productQ))
        // arrayToSend[j].cartQty = parseInt(cartQ) + parseInt(productQ)
     }
    }
   
    //pushar in produkt informationen i arrayToSend som ska skickas till localstorage
    arrayToSend.push(product);

    //tömmer productArray(för att det inte ska bli dubletter)
    productArray = [];

    //skickar in arraYToSend till localstorage med nyckeln products.
    localStorage.setItem("products", JSON.stringify(arrayToSend));
  });
}

// INSERT INTO webshop_orderscomplete SELECT * FROM webshop_orders WHERE status = 2;

// DELETE FROM webshop_orders WHERE status = 2;