// let btn1 = document.querySelectorAll(".cart-btn");
// let btn2 = document.querySelectorAll(".add-to-cart");
// let btnLess = document.querySelectorAll(".delete");
// let btndelete = document.querySelectorAll("#empty-cart");
// let counters = document.querySelectorAll(".counter");

// showValue();

// function showValue() {
//   if (JSON.parse(localStorage.getItem("counter")) !== null) {
//     value = localStorage.getItem("counter");
//   } else {
//     value = 0;
//   }

//   counters[0].textContent = value;
// }

// for (let i = 0; i < btn1.length; i++) {
//   const addToCartBtn = btn1[i];
//   btn1[i].addEventListener("click", btn1Count);
// }

// for (let l = 0; l < btn2.length; l++) {
//   const addToCartBtn2 = btn2[l];
//   btn2[l].addEventListener("click", btn1Count);
// }

// for (let j = 0; j < btnLess.length; j++) {
//   const element2 = btnLess[j];
//   btnLess[j].addEventListener("click", btn1Less);
// }

// function btn1Count(event) {
//   counters[0].textContent = parseInt(counters[0].textContent) + 1;
//   let value = counters[0].textContent;
//   localStorage.setItem("counter", value);
//   showValue();
//   location.reload()
// }

// function btn1Less(event) {
//   counters[0].textContent = parseInt(counters[0].textContent) - 1;
//   // let value = counters[0].textContent -1;

//   localStorage.setItem("counter", value);
//   showValue();
// }

// for (let k = 0; k < btndelete.length; k++) {
//   const element3 = btndelete[k];
//   btndelete[k].addEventListener("click", btn1delete);
// }
// function btn1delete(event) {
//   counters[0].textContent = 0;
//   let value = 0;
//   localStorage.setItem("counter", value);
// }

// function showValue() {
//   if (JSON.parse(localStorage.getItem("products")) !== null) {
//     value = JSON.parse(localStorage.getItem("products"));
//   } else {
//     value = 0;
//   }

//   counters[0].textContent = value;
// }

//////////

let counters = document.querySelector("#counter");
let btn1 = document.querySelectorAll(".cart-btn");
let btnLess = document.querySelectorAll(".delete");
let products;
products = JSON.parse(localStorage.getItem("products"));

//maddes?
// function showValue() {
//   if (JSON.parse(localStorage.getItem("counter")) !== null) {
//     value = localStorage.getItem("counter");
//   } else {
//     value = 0;
//   }
//   counters[0].textContent = value;
//   localStorage.setItem("counter", value);
// }

//Hannahs
for (let i = 0; i < btn1.length; i++) {
  btn1[i].addEventListener("click", updateCartCount);
}

for (let j = 0; j < btnLess.length; j++) {
  btnLess[j].addEventListener("click", updateCartCount);
}

updateCartCount();
//Hannahs
function updateCartCount() {
  let products;
  let cartValue = 0;
  let sum = 0;
  if (JSON.parse(localStorage.getItem("products")) !== null) {
    products = JSON.parse(localStorage.getItem("products"));
    for (let x = 0; x < products.length; x++) {
      let cartValue = products[x].cartQty;
      sum += parseInt(cartValue);
      console.log(sum);
    }

    counters.textContent = sum;
  } else {
    products = 0;
    counters.textContent = products;
    console.log(products.length);
  }
}

////////////
//Hannahs
// function updateCartCount2 () {
//   let products
//   if (JSON.parse(localStorage.getItem("products")) !== null) {
//     products = JSON.parse(localStorage.getItem("products"));
//     console.log(products.length)
//     counters.textContent = products.length
//     btnLess = ""
//     window.location.hash = '#tab2';
//     window.location.reload(true);

//   } else {
//     products = 0;
//     counters.textContent = products
//     console.log(products.length)
//   }
// }
// //maddes
// function btn1Less(event) {
//   counters[0].textContent = parseInt(counters[0].textContent) - 1;
//   let value = counters[0].textContent;
//   localStorage.setItem("counter", value);
//   showValue();

// }
