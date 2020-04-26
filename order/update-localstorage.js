   
let cartBtn = document.querySelectorAll(".cart-btn");
let productArray = []
const arrayToSend = JSON.parse(localStorage.getItem("products"));

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
          console.log(product.title, product.price, product.quantity, product.productid, product.outletprice)
        }
        console.log(product.title, product.price, product.quantity, product.productid)
        arrayToSend.push(product)
        productArray = []
        // console.log(arrayToSend)
        localStorage.setItem("products", JSON.stringify(arrayToSend));
         
        
     })
    }
    
  

