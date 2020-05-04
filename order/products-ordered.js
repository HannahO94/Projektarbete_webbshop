hiddenProducts()
function hiddenProducts() {
	let totalOrderPrice = localStorage.getItem("totalprice")
	console.log(totalOrderPrice)

	let newArray = []
	const productInput = document.querySelector("#products")
	const totalPriceInput = document.querySelector("#totalprice")

	for (let i = 0; i < myProducts.length; i++) {
		newArray.push(myProducts[i])
	}
	totalPriceInput.value = totalOrderPrice
	productInput.value = JSON.stringify(newArray)
}
