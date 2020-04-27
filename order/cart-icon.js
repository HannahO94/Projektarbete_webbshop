let btn1 = document.querySelectorAll(".cart-btn");
let btn2 = document.querySelectorAll(".add-to-cart");
let btnLess = document.querySelectorAll(".delete");
let btndelete = document.querySelectorAll("#empty-cart");
let counters = document.querySelectorAll(".counter");

showValue();

function showValue() {
  value = localStorage.getItem("counter");
  counters[0].textContent = value;
}

for (let i = 0; i < btn1.length; i++) {
  const addToCartBtn = btn1[i];
  btn1[i].addEventListener("click", btn1Count);
}

for (let l = 0; l < btn2.length; l++) {
  const addToCartBtn2 = btn2[l];
  btn2[l].addEventListener("click", btn1Count);
}

for (let j = 0; j < btnLess.length; j++) {
  const element2 = btnLess[j];
  btnLess[j].addEventListener("click", btn1Less);
}

function btn1Count(event) {
  counters[0].textContent = parseInt(counters[0].textContent) + 1;
  let value = counters[0].textContent;
  localStorage.setItem("counter", value);
  showValue();
}

function btn1Less(event) {
  counters[0].textContent = parseInt(counters[0].textContent) - 1;
  let value = counters[0].textContent;
  localStorage.setItem("counter", value);
  showValue();
}

for (let k = 0; k < btndelete.length; k++) {
  const element3 = btndelete[k];
  btndelete[k].addEventListener("click", btn1delete);
}
function btn1delete(event) {
  counters[0].textContent = 0;
  let value = 0;
  localStorage.setItem("counter", value);
}