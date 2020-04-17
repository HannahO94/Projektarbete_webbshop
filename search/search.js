let searchResult = document.querySelector("#searched-result");
let searchField = document.querySelector("#search-Field");

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
      //minst två tecken validering
      if (searchField.value.length >= 2) {
        display();
      } else {
        searchResult.innerHTML = null;
      }
    });

    //filtrerar och visar spelen som matchar sökningen
    function display() {
      let searchedGame = gamesTitle.filter(function (game) {
        return game.toLowerCase().includes(searchField.value.toLowerCase());
      });
     
      for (let i = 0; i < games.length; i++) {
         for (let j = 0; j < searchedGame.length; j++) {
            if (games[i].title === searchedGame[j] || games[i].description === searchedGame[j]){
         
              //visa titel + pris + bild som länkar kopplade till resp produktsida
              let listedGames = document.createElement("a");
              listedGames.textContent = games[i].title + " " + games[i].price + " kr ";
              listedGames.href ="../product/product_info.php?id= " + games[i].productid;
              searchResult.appendChild(listedGames);
            }
          }
        }
      }
    }
  }
