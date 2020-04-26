let searchResult = document.querySelector("#searched-result");
let searchField = document.querySelector("#search-Field");
let searchBtn = document.querySelector("#search_btn");
let searchLink = document.querySelector("#search-link");
let output = new Array();
let productId = new Array();

// anropa ajax
let ajax = new XMLHttpRequest();

//let url = "read.php";
ajax.open("GET", "../search/read.php", true);
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
      //gamesTitle.push(games[i].description); //sök även på beskrivning, ändrat krav från kund
    }

    //eventlistener på sökknapp
    searchBtn.addEventListener("click", function (event) {
      console.log("click");
      searchLink.href = "../search/index.php?id=" + productId;
    });

    //eventlistener på sökfältt
    searchField.addEventListener("input", function (event) {
      emptySearch();

      //minst två tecken validering
      if (searchField.value.length >= 2) {
        filter();
      } else {
        searchResult.innerHTML = null;
      }
    });

    /*
    // Lyssnare som hanterar enter-tryck i searchField
    searchField.addEventListener("keydown", function (event) {
      // Nummer 13 är Enter-knappen
      if (event.keyCode === 13) {
        //Vi vill inte göra default action, dvs den action som anges i
        //formuläret (skicka till samma sida) + lägga till värdet i
        //searchField i url:en. T ex sök från index på rått ger:
        //http://localhost/index.php?search=r%C3%A5tt#
        event.preventDefault(); //får ej denna att funka
        //Vill istället göra samma som om man skulle tryckt på sök-knappen
        document.getElementById("searchBtn").click();
      }
    });*/

    //filtrerar och loopar igenom titel och beskrivning föra tt hitta matchning
    //om matchning hittas - skickas vidare för att ritas ut
    function filter() {
      let searchedGame = gamesTitle.filter(function (game) {
        return game.toLowerCase().includes(searchField.value.toLowerCase());
      });

      //console.log(searchedGame);
      //töm båda arrayerna varje gång tanget trycks, annars ritas inte förfinade sökningen om
      output.splice(0, output.length);
      productId.splice(0, productId.length);

      for (let i = 0; i < games.length; i++) {
        for (let j = 0; j < searchedGame.length; j++) {
          if (
            games[i].title === searchedGame[j]
            // || games[i].description === searchedGame[j]
          ) {
            if (productId.includes(games[i].productid)) {
              display(productId, output);
            } else {
              output.push(
                " | " + games[i].title + " " + games[i].price + " kr " + " | "
              );
              productId.push(games[i].productid);
              //display(productId, output);
            }
          }
        }
      }
    }

    function display() {
      //töm div innerhtml för att kunna rita om när en förfinad sökning görs
      searchResult.innerHTML = " ";

      for (let i = 0; i < output.length; i++) {
        let listedGames = document.createElement("a");
        //console.log("output i forloop i display()  " + output + productId)
        listedGames.textContent = output[i];
        listedGames.href = "../product/product_info.php?id= " + productId[i];
        listedGames.id = productId[i];

        //kontroll av id på a-tagg - om den finns rita inte ut en ny
        let element = document.getElementById(productId[i]);
        if (element !== null) {
        } else {
          searchResult.appendChild(listedGames);
        }
      }
    }
  }

  function emptySearch() {
    if (searchField.value === "") {
      output.splice(0, output.length);
      productId.splice(0, productId.length);
    }
  }
};
