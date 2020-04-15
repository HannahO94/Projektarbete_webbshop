let searchedGames = document.querySelector('#searched-games')
let searchField = document.querySelector('#search-Field')
//let games = ["monopol", "uno", "twister", "poker"] //array att testa med tills databasen är korrekt kopplad

// anropa ajax
let ajax = new XMLHttpRequest();
//let url = "read.php";
ajax.open("GET", "read.php", true);
//skicka ajax request
ajax.send();
//ta emot svar från php fil
ajax.onreadystatechange = function () {

  //console.log(this.readyState);
  if (this.readyState === 4 && this.status === 200) {
    //konvertera JSON tillbaka till array
    let games = JSON.parse(this.responseText);
    console.log(games)

    /*********här har mimmi testat massa konstigt 
        let newArr = [];
        for (let i = 0; i < games.length; i++){
          //console.log(games[i].title);
          newArr.push(games[i].title)
        }
        for (let i = 0; i < games.length; i++) {
          if (newArr[i] === games[i].title) {
            searchedGames.innerHTML = games[i].title + " "  + games[i].price + " kr" + "<br>" + games[i].description + "<br>"
          }
        }
        console.log(newArr)
    /*********test slut***********/
      

    //eventlistener på sökfältt
    searchField.addEventListener('input', function (event) {
      //minst två tecken validering
      if (searchField.value.length >= 2) {
        display()
      } else {
        searchedGames.innerHTML = null
      }
    })
    //filtrerar och visar spelen som matchar sökningen 
    function display() {
      let searchedGame = games.filter(function (game) {
        return game.toLowerCase().includes(searchField.value.toLowerCase())
      })

      searchedGames.innerHTML = ''
      for (let i = 0; i < searchedGame.length; i++) {
        let listedGames = document.createElement('p')
        listedGames.textContent = searchedGame[i];
        searchedGames.appendChild(listedGames);
      }
    }
  }
}
