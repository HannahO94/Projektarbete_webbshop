//Tillfällig testarray, ska egentligen vara array med varukorg från LS
// let myProducts = [
//   { id: 1, title: "Alias", price: 100, quantity: 2 },
//   { id: 2, title: "Råttfällan", price: 250, quantity: 4 },
//   { id: 3, title: "Labyrint", price: 150, quantity: 1 },
// ];

let myProducts = JSON.parse(localStorage.getItem("products"));

//Skapa variabler för DOM-elementen som ska användas nedan
const shoppingCart = document.querySelector("#shoppingcart");

drawCart();
//Rita ut produktinfo samt knappar
function drawCart() {
  //Börja med att rensa gammalt innehåll i varukorgen
  shoppingCart.innerHTML = "";

  myProducts.forEach(function (item) {
    const productRow = document.createElement("tr");

    const title = document.createElement("td");
    title.textContent = item.title;
    console.log(item.title);
    const price = document.createElement("td");
    price.textContent = item.price;
    console.log(item.price);

    const quantity = document.createElement("td");
    quantity.textContent = item.quantity;

    const deleteButton = document.createElement("button");
    deleteButton.textContent = "❌";
    deleteButton.classList.add("delete");
    deleteButton.dataset.productID = item.id;
    deleteButton.addEventListener("click", removeProduct);

    const minusButton = document.createElement("button");
    minusButton.textContent = "➖";
    minusButton.classList.add("minusQty");
    minusButton.dataset.productID = item.id;
    //console.log("minus" + minusButton.dataset.productID);
    minusButton.addEventListener("click", changeQty);

    const plusButton = document.createElement("button");
    plusButton.textContent = "➕";
    plusButton.classList.add("plusQty");
    plusButton.dataset.productID = item.id;
    //console.log("plus" + plusButton.dataset.productID);
    plusButton.addEventListener("click", changeQty);

    productRow.appendChild(title);
    productRow.appendChild(price);
    productRow.appendChild(deleteButton);
    productRow.appendChild(minusButton);
    productRow.appendChild(quantity);
    productRow.appendChild(plusButton);

    shoppingCart.appendChild(productRow);
  });
}

//Skapa lyssnare för ta bort-knapp respektive antal-knappar?
//I dessa lyssnare anropas vid event respektive "mini-funktion"?
//Kan vi skapa dessa lyssnare utanför drawCart?

//Funktion för att ta bort produkt
function removeProduct(event) {
  const productID = parseInt(event.currentTarget.dataset.productID);
  const removedProducts = myProducts.filter(function (item) {
    const itemID = item.id;
    return itemID !== productID;
  });
  myProducts = removedProducts;
  //updateLocalStorage()
  drawCart();
}

//Funktion för att ändra antal på produkt
function changeQty(event) {
  let productID = parseInt(event.currentTarget.dataset.productID);
  let currentButton = event.currentTarget;
  //Loopa igenom produktarrayen för att hitta det id som matchar
  //med eventets id
  //Detta kanske kan skötas med filter ist f en for-loop?
  for (let i = 0; i < myProducts.length; i++) {
    const currentProductID = myProducts[i].id;
    //If-sats som jämför array-objektets id med eventets id
    if (currentProductID == productID) {
      let qty = parseInt(myProducts[i].quantity);

      //När vi får match kollar vi om knappen är minus eller plus med ytterligare if-sats
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
    //updateLocalStorage()
    drawCart();
  }
}
