// 1. HÄMTA OCH RITA UT BESTÄLLDA PRODUKTER

//Hämta produktarray från Localstorage
let productsInLocalStorage = JSON.parse(localStorage.getItem("products"))
console.log(productsInLocalStorage)

//Hämta nödvändiga element från bekräftelsesidan
const orderedProducts = document.querySelector("#ordered-products")
const orderTotalPrice = document.querySelector("#order-total-price")

//Funktionen drawOrderedProducts() skriver ut alla produkter på sidan, en tabellrad i taget
drawOrderedProducts()

function drawOrderedProducts() {
	//Börja med att rensa gammalt innehåll i div:en som innehåller produktöversikten
	orderedProducts.innerHTML = ""

	//För varje produkt i localstorage-arrayen - skapa en rad (tr) och aktuella kolumner (td)
	productsInLocalStorage.forEach(function (item) {
		const productRow = document.createElement("tr")

		const title = document.createElement("td")
		title.textContent = item.title
		//Här hämtas cartQty - Ett värde som läggs till i produktobjektet som sparas i LS
		//Antingen default 1 eller att det hämtar värde från ett inputfält
		const quantity = document.createElement("td")
		quantity.textContent = item.cartQty
		const price = document.createElement("td")
		price.textContent = `${item.price} kr`

		productRow.appendChild(title)
		productRow.appendChild(quantity)
		productRow.appendChild(price)
		orderedProducts.appendChild(productRow)
	})

	console.log(orderedProducts)

	//Räkna ut totalpris
	let total = totalPrice(productsInLocalStorage)
	console.log(total)
	orderTotalPrice.textContent = `Totalpris: ${total} kr `

	//Rensa localStorage
	localStorage.clear()
}

// 2. HÄMTA OCH RITA UT KUNDUPPGIFTER (med javascript eller php - hämta från databasen?)

// Hämta nödvändiga element från orderformuläret
const customerForm = document.querySelector("#customer-form")
// const orderSubmit = document.querySelector("#order-submit")

const nameInput = document.querySelector("#name")
console.log(nameInput)
const emailInput = document.querySelector("#email")
const phoneInput = document.querySelector("#phone")
const streetInput = document.querySelector("#street")
const zipcodeInput = document.querySelector("#zip")
const cityInput = document.querySelector("#city")
const statusInput = document.querySelector("#status")

//Koppla events
customerForm.addEventListener("submit", save)
// orderSubmit.addEventListener("click", save)

function save(event) {
	event.preventDefault()
	console.log("kör funktionen?")
	let name = nameInput.value
	let email = emailInput.value
	let phone = phoneInput.value
	let street = streetInput.value
	let zipcode = zipcodeInput.value
	let city = cityInput.value
	let status = statusInput.value
	console.log("hej " + name)
	console.log(email)
}

//Hämta nödvändiga element från bekräftelsesidan
const customerDetails = document.querySelector("#customer-details")

const nameOutput = document.createElement("p")
nameOutput.textContent = "hej"

customerDetails.appendChild(nameOutput)
console.log(nameOutput)
