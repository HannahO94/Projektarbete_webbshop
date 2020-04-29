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
    //Kollar på knappens parentElement som är själva produktkortet/diven som produkten ligger i
    let parent = product.parentElement;

    //loopar över alla barn och pushar in dem i en array
    for (let i = 0; i < parent.children.length; i++) {
      productcard = parent.children[i];
      productArray.push(productcard);
      // console.log(productArray[i]);
    }


    
    console.log(productArray.length)


    //Kollar längden på arrayen för att kunna veta vilka index i arrayen som ska hämtas ut,
    //beroende på om produkten är på rea eller om det är en ny produkt eller om den hämtas från kategorisidan eller produktsidan behöver man kämta olika
    if (productArray.length === 9) {
      product = {
        cartQty: productArray[7].value,
        title: productArray[0].textContent,
        price: productArray[3].textContent,
        quantity: productArray[4].textContent,
        productid: productArray[5].textContent,

      };
    } else if (productArray.length === 10) {
      product = {
        cartQty: productArray[8].value,
        title: productArray[1].textContent,
        price: productArray[4].textContent,
        quantity: productArray[5].textContent,
        productid: productArray[6].textContent,
      };
    } else if (productArray.length === 11) {
      product = {
        cartQty: productArray[9].value,
        title: productArray[0].textContent,
        price: productArray[5].textContent,
        quantity: productArray[6].textContent,
        productid: productArray[7].textContent,
      };
    } else if (productArray.length === 12) {
      product = {
        cartQty: productArray[10].value,
        title: productArray[1].textContent,
        price: productArray[5].textContent,
        outletprice: productArray[6].textContent,
        quantity: productArray[7].textContent,
        productid: productArray[8].textContent,
      };
      
    }else if (productArray.length === 13) {
      product = {
        cartQty: productArray[10].value,
        title: productArray[1].textContent,
        price: productArray[6].textContent,
        quantity: productArray[7].textContent,
        productid: productArray[8].textContent,
      };
      
    }
    else if (productArray.length === 14) {
      product = {
        cartQty: productArray[12].value,
        title: productArray[0].textContent,
        price: productArray[7].textContent,
        outletprice: productArray[8].textContent,
        quantity: productArray[9].textContent,
        productid: productArray[10].textContent,
      };
      
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
    // console.log(arrayToSend)
    //skickar in arraYToSend till localstorage med nyckeln products.

    localStorage.setItem("products", JSON.stringify(arrayToSend));
  });
}

