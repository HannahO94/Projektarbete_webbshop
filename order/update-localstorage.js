   
let cartBtn = document.querySelectorAll(".cart-btn");
let addToCartBtn = document.querySelectorAll(".add-to-cart");
let productArray = []
let arrayToSend 

if (JSON.parse(localStorage.getItem("products")) !== null){
  arrayToSend = JSON.parse(localStorage.getItem("products"))
}
else {
  arrayToSend = []
}

    for (let j = 0; j < cartBtn.length; j++) {
      // allButtons.push(addToCartBtn[j])
      let product = cartBtn[j]
      
      cartBtn[j].addEventListener("click", function (e) {
        let parent = product.parentElement

        for (let i = 0; i < parent.children.length; i++){
          productcard = parent.children[i].textContent
          productArray.push(productcard)
          console.log(productcard)
        }
        console.log(productArray.length)
        if(productArray.length === 7){
        product = {
                  title: productArray[0],
                  price: productArray[3],
                  quantity: productArray[4],
                  productid: productArray[5]
                };
              }
        else if (productArray.length === 8){
          product = {
            title: productArray[1],
            price: productArray[4],
            quantity: productArray[5],
            productid: productArray[6]
          };
        }
        else if (productArray.length === 10){
          product = {
            title: productArray[1],
            price: productArray[5],
            outletprice: productArray[6],
            quantity: productArray[7],
            productid: productArray[8]
          };
          // console.log(product.title, product.price, product.quantity, product.productid, product.outletprice)
        }
        // console.log(product.title, product.price, product.quantity, product.productid)
        arrayToSend.push(product)
        productArray = []
        // console.log(arrayToSend)
        localStorage.setItem("products", JSON.stringify(arrayToSend));
         
        
     })
    }
    

    for (let x = 0; x < addToCartBtn.length; x++) {
      // allButtons.push(addToCartBtn[j])
      let product = addToCartBtn[x]
      prodarray = []
      addToCartBtn[x].addEventListener("click", function (e) {
        let parent = product.parentElement
        
        for (let y = 0; y < parent.children.length; y++){
          // console.log(parent.childNodes[y])
          productcard = parent.children[y].textContent
          prodarray.push(productcard)
          console.log(prodarray)
        
        }
            product = {
                      title: prodarray[0],
                      price: prodarray[3],
                      quantity: prodarray[4],
                      productid: prodarray[5]
                    };
                  
      
              
            
            // console.log(product.title, product.price, product.quantity, product.productid)
            arrayToSend.push(product)
            productArray = []
            // console.log(arrayToSend)
            localStorage.setItem("products", JSON.stringify(arrayToSend));
      
    })
  }