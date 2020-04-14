let searchedGames = document.querySelector('#searched-games')
let searchField = document.querySelector('#search-Field')
let games = ["monopol", "uno", "twister", "poker"] //array att testa med tills databasen är korrekt kopplad

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
    let listedGames = document.createElement('li')
    listedGames.textContent = searchedGame[i];
    searchedGames.appendChild(listedGames);
  }
}


