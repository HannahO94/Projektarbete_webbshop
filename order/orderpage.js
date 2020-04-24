

let order = JSON.parse(localStorage.getItem("products"));

for (let i = 0; i < order.length; i++) {
    console.log(order[i])
    for (let j = 0; j < order[i].length; j++){
        console.log(order[i][j])
    }

}

