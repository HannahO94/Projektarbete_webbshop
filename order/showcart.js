//Spara varukorgen = uppdatera localStorage
function updateLocalStorage() {
			localStorage.clear() //Rensar först localStorage
			localStorage.setItem("storedItems", JSON.stringify($cartArray)) //Spara aktuell array i localStorage
		}

function showCart(){}
