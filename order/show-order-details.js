// // 1. HÄMTA OCH RITA UT BESTÄLLDA PRODUKTER

// //Hämta produktarray från Localstorage
let productsInLocalStorage = JSON.parse(localStorage.getItem("products"))
console.log(productsInLocalStorage)

//Hämta nödvändiga element från bekräftelsesidan
const orderedProducts = document.querySelector("#product-container")
const orderTotalPrice = document.querySelector("#order-total-price")
const orderDetail = document.querySelector("#contact-container")

//Funktionen drawOrderedProducts() skriver ut alla produkter på sidan, en tabellrad i taget
drawOrderedProducts()
drawOrderDetail()

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

	// console.log(orderedProducts)

	//Räkna ut totalpris
	let total = totalPrice(productsInLocalStorage)
	console.log(total)
	orderTotalPrice.textContent = `Totalpris: ${total} kr `

	//Rensa localStorage
	// localStorage.clear()
}

// 2. HÄMTA OCH RITA UT KUNDUPPGIFTER (med javascript eller php - hämta från databasen?)

// Hämta nödvändiga element från orderformuläret


let addbtn = document.querySelector("#form-container__submit-button");

addbtn.addEventListener("submit", save)

function save() {
// event.preventDefault()

// console.log("hello")
	const submitArray = []
	const contactForm = document.querySelector("#contact-form")
	const nameInput = document.querySelector("#name")
	const emailInput = document.querySelector("#email")
	const phoneInput = document.querySelector("#phone")
	const streetInput = document.querySelector("#street")
	const zipcodeInput = document.querySelector("#zip")
	const cityInput = document.querySelector("#city")
	const statusInput = document.querySelector("#status")


		let name = nameInput.value
		let email = emailInput.value
		let phone = phoneInput.value
		let street = streetInput.value
		let zipcode = zipcodeInput.value
		let city = cityInput.value
		let status = statusInput.value
	
		console.log("hej" + name)
		// console.log(email)


		orderinfo = {
			name: name,
			email: email,
			phone: phone,
			street: street,
			zipcode: zipcode,
			city: city, 
			status: status, 
}
// console.log(orderinfo.name, orderinfo.email)
submitArray.push(orderinfo)
localStorage.setItem("orderdetail", JSON.stringify(submitArray))
window.location="order-confirmation.php";
}



function drawOrderDetail() {
	let orderInLocalStorage = JSON.parse(localStorage.getItem("orderdetail"))
	orderDetail.innerHTML = ""
	//För varje produkt i localstorage-arrayen - skapa en rad (tr) och aktuella kolumner (td)
	orderInLocalStorage.forEach(function (obj) {
		const orderRow = document.createElement("tr")
		
		const name1 = document.createElement("td")
		name1.textContent = obj.name
		//Här hämtas cartQty - Ett värde som läggs till i produktobjektet som sparas i LS
		//Antingen default 1 eller att det hämtar värde från ett inputfält
		const email1 = document.createElement("td")
		email1.textContent = obj.email
		const phone1 = document.createElement("td")
		phone1.textContent = obj.phone
		const street1 = document.createElement("td")
		street1.textContent = obj.street
		const zip = document.createElement("td")
		zip.textContent = obj.zipcode
		const city1 = document.createElement("td")
		city1.textContent = obj.city

		orderRow.appendChild(name1)
		orderRow.appendChild(email1)
		orderRow.appendChild(phone1)
		orderRow.appendChild(street1)
		orderRow.appendChild(zip)
		orderRow.appendChild(city1)
		orderDetail.appendChild(orderRow)
	})
	localStorage.clear()

}

// //Hämta nödvändiga element från bekräftelsesidan
// const contactDetails = document.querySelector("#contact-container")
