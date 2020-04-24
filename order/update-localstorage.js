   
let cartBtn = document.querySelectorAll(".cart-btn");
let productArray = []
let arrayToSend = []
    for (let j = 0; j < cartBtn.length; j++) {
      // allButtons.push(addToCartBtn[j])
      let product = cartBtn[j]
      
      cartBtn[j].addEventListener("click", function (e) {
        let parent = product.parentElement

        for (let i = 0; i < parent.children.length; i++){
          productcard = parent.children[i].textContent
          productArray.push(productcard)
          console.log(productArray)
        }
        product = {
                  title: productArray[0],
                  price: productArray[2],
                  quantity: productArray[5],
                  productid: productArray[6]
                };

        console.log(product.title, product.price, product.quantity, product.productid)
        arrayToSend.push(product)
        productArray = []
        // console.log(arrayToSend)
        localStorage.setItem("products", JSON.stringify(arrayToSend));
         
        
     })
    }
    
  

