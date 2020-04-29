// let productsInProducts = JSON.parse(localStorage.getItem("products"))
let totalOrderPrice = localStorage.getItem("totalprice")
hiddenProducts()
console.log(totalOrderPrice)
function hiddenProducts (){
	// let productsInLS = JSON.parse(localStorage.getItem("products"))
	
	let newArray = []
	const productInput = document.querySelector("#products")
	const totalPriceInput = document.querySelector("#totalprice")

	
	// productInput.value = JSON.stringify(myProducts)
	// console.log(myProducts)
	for (let i = 0; i < myProducts.length; i++){
		// console.log(myProducts[i])
		newArray.push(myProducts[i])
	}
	totalPriceInput.value = totalOrderPrice
    productInput.value = JSON.stringify(newArray)
}
