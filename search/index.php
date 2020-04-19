<?php
require_once "../header_extern.php"
?>

<form action="#" class="search-form">
  <label for="search" class="search-form__label">Sök efter spel</label>
  <br>
  <input type="text" name="search" id="search-Field" class="search-form__input-field">
</form>

<!--i nedan div mha php rita ut produktkort-->
<div id="searched-result" class="search-result"></div>

<button class="btn-back">Tillbaka</button>

<script type="application/javascript" src="search.js"></script>

<?php
require_once "../footer.php"
?>