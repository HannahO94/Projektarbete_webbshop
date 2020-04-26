let cartBtn = document.querySelectorAll(".cart-btn");
let addToCartBtn = document.querySelectorAll(".add-to-cart");
let productArray = [];
let arrayToSend;

if (JSON.parse(localStorage.getItem("products")) !== null) {
  arrayToSend = JSON.parse(localStorage.getItem("products"));
} else {
  arrayToSend = [];
}

for (let j = 0; j < cartBtn.length; j++) {
  // allButtons.push(addToCartBtn[j])
  let product = cartBtn[j];

  cartBtn[j].addEventListener("click", function (e) {
    let parent = product.parentElement;

    for (let i = 0; i < parent.children.length; i++) {
      productcard = parent.children[i];
      productArray.push(productcard);
      // console.log(productcard);
    }
    console.log(productArray.length);
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
    } else if (productArray.length === 12) {
      product = {
        cartQty: productArray[10].value,
        title: productArray[1].textContent,
        price: productArray[5].textContent,
        outletprice: productArray[6].textContent,
        quantity: productArray[7].textContent,
        productid: productArray[8].textContent,
      };
      // console.log(product.title, product.price, product.quantity, product.productid, product.outletprice)
    }
    console.log(product.title, product.price, product.quantity, product.productid, product.cartQty)
    arrayToSend.push(product);
    productArray = [];
    // console.log(arrayToSend)
    localStorage.setItem("products", JSON.stringify(arrayToSend));
  });
}

for (let x = 0; x < addToCartBtn.length; x++) {
  // allButtons.push(addToCartBtn[j])
  let product = addToCartBtn[x];
  prodarray = [];
  addToCartBtn[x].addEventListener("click", function (e) {
    let parent = product.parentElement;

    for (let y = 0; y < parent.children.length; y++) {
      // console.log(parent.childNodes[y])
      productcard = parent.children[y];
      prodarray.push(productcard);
      // console.log(prodarray)
    }
    product = {
      cartQty: prodarray[9].value,
      title: prodarray[0].textContent,
      price: prodarray[5].textContent,
      quantity: prodarray[6].textContent,
      productid: prodarray[7].textContent,
    };

    console.log(
      product.cartQty,
      product.title,
      product.price,
      product.quantity,
      product.productid
    );
    arrayToSend.push(product);
    productArray = [];
    // console.log(arrayToSend)
    localStorage.setItem("products", JSON.stringify(arrayToSend));
  });
}
