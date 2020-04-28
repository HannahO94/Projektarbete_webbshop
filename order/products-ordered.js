// let productsInProducts = JSON.parse(localStorage.getItem("products"))

hiddenProducts()

function hiddenProducts (){
	// let productsInLS = JSON.parse(localStorage.getItem("products"))
	const productInput = document.querySelector("#products")
    productInput.value = JSON.stringify(myProducts)
    
}