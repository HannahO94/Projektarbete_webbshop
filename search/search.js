let searchResult = document.querySelector("#searched-result");
let searchField = document.querySelector("#search-Field");
let output = new Array;
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
    let gamesTitle = new Array();

    for (let i = 0; i < games.length; i++) {
      gamesTitle.push(games[i].title);
      gamesTitle.push(games[i].description)
    }

    //eventlistener på sökfältt
    searchField.addEventListener("input", function (event) {
      emptySearch()
      //minst två tecken validering
      if (searchField.value.length >= 5) {
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
            if (output.includes(games[i].title + " " + games[i].price + " kr ")) {
              console.log("yes it includes")
              console.log(output)
            } else {

              console.log("no it doesnt include")
              console.log(output)
              output.push(games[i].title + " " + games[i].price + " kr ")
              display(output)

            }
          }
        }
      }
    }

    //ritar ut resultat i html
    function display(output) {
      let listedGames = document.createElement("a");
      let newRow = document.createElement("br")
      for (let i = 0; i < output.length; i++) {
        listedGames.textContent = output[i]
        listedGames.href = "../product/product_info.php?id= " + games[i].productid;
        searchResult.appendChild(listedGames);
        searchResult.appendChild(newRow)
      }

    }

    function emptySearch() {
      if (searchField.value === "") {
        output.splice(0, output.length)
      }
    }
  }
}

