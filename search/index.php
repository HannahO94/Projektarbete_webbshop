<?php
require_once "../header_extern.php"
?>

<form action="#">
    <label for="search">Sök efter spel</label>
    <br>
    <input 
    type="text"
    name="search"
    id="search-Field">
  </form>
  
  <div id="searched-result"></div>

  <button>Tillbaka</button>
 <script type="application/javascript" src="search.js"></script>
 
<?php
require_once "../footer_extern.php"
?>
