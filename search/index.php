<?php
require_once "../header_extern.php"
?>

<div class="search-form">
  <form action="#">
    <label for="search" class="search-form__label">Sök efter spel</label>
    <br>
    <input type="text" name="search" id="search-Field" class="search-form__input">
  </form>
</div>
<div id="searched-result" class="search-result"></div>

<button>Tillbaka</button>
<script type="application/javascript" src="search.js"></script>

<?php
require_once "../footer_extern.php"
?>