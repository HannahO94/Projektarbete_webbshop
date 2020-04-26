//Tillfällig testarray, ska egentligen vara array med varukorg från LS
// let myProducts = [
//   { id: 1, title: "Alias", price: 100, quantity: 2 },
//   { id: 2, title: "Råttfällan", price: 250, quantity: 4 },
//   { id: 3, title: "Labyrint", price: 150, quantity: 1 },
// ];

let myProducts = JSON.parse(localStorage.getItem("products"));

//Skapa variabler för DOM-elementen som ska användas nedan
const shoppingCart = document.querySelector("#shoppingCart");
const emptyCartBtn = document.querySelector("#empty-cart");
const orderValue = document.querySelector("#orderValue");

drawCart();
//Rita ut produktinfo samt knappar
function drawCart() {
  //Börja med att rensa gammalt innehåll i varukorgen
  shoppingCart.innerHTML = "";

  myProducts.forEach(function (item) {
    const productRow = document.createElement("tr");

    const title = document.createElement("td");
    title.textContent = item.title;
    const price = document.createElement("td");
    price.textContent = item.price;

    const quantity = document.createElement("td");
    quantity.textContent = item.quantity;

    const deleteButton = document.createElement("button");
    deleteButton.textContent = "❌";
    deleteButton.classList.add("delete");
    deleteButton.dataset.productID = item.productid;
    deleteButton.addEventListener("click", removeProduct);

    const minusButton = document.createElement("button");
    minusButton.textContent = "➖";
    minusButton.classList.add("minusQty");
    minusButton.dataset.productID = item.productid;
    minusButton.addEventListener("click", changeQty);

    const plusButton = document.createElement("button");
    plusButton.textContent = "➕";
    plusButton.classList.add("plusQty");
    plusButton.dataset.productID = item.productid;
    plusButton.addEventListener("click", changeQty);

    productRow.appendChild(title);
    productRow.appendChild(price);
    productRow.appendChild(deleteButton);
    productRow.appendChild(minusButton);
    productRow.appendChild(quantity);
    productRow.appendChild(plusButton);

    shoppingCart.appendChild(productRow);
  });
  //Räkna ut totalpris
  let total = totalPrice(myProducts);
  orderValue.textContent = `Ordervärde totalt: ${total} kr `;
}

//Lyssnare till Töm varukorg som ropar på emptyCart
emptyCartBtn.addEventListener("click", emptyCart);

//Funktion för att ta bort produkt
function removeProduct(event) {
  const productID = parseInt(event.currentTarget.dataset.productID);
  const removedProducts = myProducts.filter(function (item) {
    const itemID = parseInt(item.productid);
    return itemID !== productID;
  });
  myProducts = removedProducts;
  updateLocalStorage();
  drawCart();
}

//Funktion för att ändra antal på produkt
function changeQty(event) {
  let productID = parseInt(event.currentTarget.dataset.productID);
  let currentButton = event.currentTarget;

  //Loopa igenom produktarrayen för att hitta det id som matchar
  //med eventets id
  for (let i = 0; i < myProducts.length; i++) {
    const currentProductID = myProducts[i].productid;
    //If-sats som jämför array-objektets id med eventets id
    if (currentProductID == productID) {
      let qty = parseInt(myProducts[i].quantity);

      //När vi får match kollar vi om knappen är minus eller plus
      if (currentButton.classList.contains("plusQty")) {
        //öka produktens antal med 1
        qty++;
        myProducts[i].quantity = qty;
      } else if (currentButton.classList.contains("minusQty")) {
        //minska produktens antal med 1
        qty--;
        myProducts[i].quantity = qty;
      } else {
        alert("something wrong with quantity changing buttons");
      }
    }
    updateLocalStorage();
    drawCart();
  }
}

//Töm varukorgen, används både vid "töm varukorgen" och "skicka beställning"
function emptyCart() {
  myProducts = [];
  drawCart();
  localStorage.clear(); //Kan vi ha denna här om vi ska kunna hämta varukorgen
  //från LS när vi skickat beställning och hamnat på orderbekräftelse?
}

function updateLocalStorage() {
  localStorage.clear(); //Töm LS, sedan lägger vi in uppdaterad myProducts.
  localStorage.setItem("products", JSON.stringify(myProducts));
}

//Räkna ut totalpris, görs varje gång varukorgen ritas ut
function totalPrice(arr) {
  let outputPrice = 0;

  for (let i = 0; i < arr.length; i++) {
    const qty = parseInt(arr[i].quantity);
    const price = parseInt(arr[i].price);
    outputPrice += qty * price;
  }
  return outputPrice;
}
