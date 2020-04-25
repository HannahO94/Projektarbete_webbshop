// HÄMTA KUNDUPPGIFTER
// Hämta nödvändiga element från orderformuläret
const contactForm = document.querySelector("#contact-form")

const nameInput = document.querySelector("#name")
const emailInput = document.querySelector("#email")
const phoneInput = document.querySelector("#phone")
const streetInput = document.querySelector("#street")
const zipcodeInput = document.querySelector("#zip")
const cityInput = document.querySelector("#city")
const statusInput = document.querySelector("#status")

//Koppla events
contactForm.addEventListener("submit", save)

function save(event) {
	event.preventDefault()

	let name = nameInput.value
	let email = emailInput.value
	let phone = phoneInput.value
	let street = streetInput.value
	let zipcode = zipcodeInput.value
	let city = cityInput.value
	let status = statusInput.value
	console.log("hej" + name)
}

//HÄMTA BESTÄLLDA PRODUKTER från localstorage

//Hämta nödvändiga element från orderformuläret

const productTable = document.querySelector("#ordered-products")

getOrderedProducts()

function getOrderedProducts() {
	productTable.innerHTML = ""
	let orderedProducts = JSON.parse(localStorage.getItem("products"))

	for (let i = 0; i < orderedProducts.length; i++) {
		console.log(orderedProducts[i].title)
	}
}

// Rensa localStorage
//localStorage.clear()
