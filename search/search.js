let searchResult = document.querySelector("#searched-result");
let searchField = document.querySelector("#search-Field");
let output = new Array;
let productId = new Array;
// anropa ajax
let ajax = new XMLHttpRequest();

//let url = "read.php";
ajax.open("GET", "read.php", true);
//skicka ajax request
ajax.send();
//ta emot svar från php fil
ajax.onreadystatechange = function () {
  if (this.readyState === 4 && this.status === 200) {
    //konvertera JSON tillbaka till array
    let games = JSON.parse(this.responseText);
    let gamesTitle = new Array;

    for (let i = 0; i < games.length; i++) {
      gamesTitle.push(games[i].title);
      gamesTitle.push(games[i].description)
    }

    //eventlistener på sökfältt
    searchField.addEventListener("input", function (event) {
      emptySearch()
      //minst två tecken validering
      if (searchField.value.length >= 2) {
        filter();

      } else {
        searchResult.innerHTML = null;
      }
    });

    //filtrerar och loopar igenom titel och beskrivning föra tt hitta matchning
    //om matchning hittas - skickas vidare för att ritas ut
    function filter() {
      let searchedGame = gamesTitle.filter(function (game) {
        return game.toLowerCase().includes(searchField.value.toLowerCase());
      });

      for (let i = 0; i < games.length; i++) {
        for (let j = 0; j < searchedGame.length; j++) {
          if (games[i].title === searchedGame[j] || games[i].description === searchedGame[j]) {
            if (productId.includes(games[i].productid)) {
            } else {
              output.push(" | " + games[i].title + " " + games[i].price + " kr " + " | ")
              productId.push(games[i].productid)
              console.log("output = " + output)
            }
          }
        }

      }
      display(productId, output);
    }

    function display() {

      for (let i = 0; i < output.length; i++) {
        let listedGames = document.createElement("a");

        listedGames.textContent = output[i]
        listedGames.href = "../product/product_info.php?id= " + productId[i];
        listedGames.id = productId[i]

        //kontroll av id på a-tagg - om den finns rita inte ut en ny
        let element = document.getElementById(productId[i])
        if (element !== null) {
          //console.log("finns")
          //console.log("element = " + listedGames.id)
        } else {
          //console.log("finns inte")
          //console.log("element = " + listedGames.id)
          searchResult.appendChild(listedGames);
        }
      }
    }
  }

  function emptySearch() {
    if (searchField.value === "") {
      output.splice(0, output.length)
      productId.splice(0, productId.length)
      //console.log("tömt output och product id arrayer")
      //console.log("tömd array : " + output)
      //console.log(productId)
    }
  }
}


