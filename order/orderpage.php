<?php
require_once '../header_extern.php';
require_once '../config/db.php';

?>

<section class="freight-info">
  <p>Fri frakt över 500 kr.</p>
  <p>Alla inom Stockholm har fri frakt.</p>
</section>

<?php



?>

<!--Varukorgen-->
<section class="shoppingcart">

  <h1>Din varukorg</h1>
  <div id="cart-items" class="cart-items">

    <!-- Här visas produkter i varukorgen via JS -->
    <?php


    ?>



<section class="order-form">
  <h1>Dina uppgifter</h1>
  <form action="#" method="POST" class="form-container">
    <div class="order_field-name form-container__box">
      <label for="name">För- och efternamn:</label><br>
      <input type="text" name="name">
    </div>
    <div class="order_field-email form-container__box">
      <label for="email">E-post:</label><br>
      <input type="text" name="email">
    </div>
    <div class="order_field-mobile form-container__box">
      <label for="mobile">Mobilnummer:</label><br>
      <input type="number" name="mobile">
    </div>
    <div class="order_field-street form-container__box">
      <label for="street">Gatuadress:</label><br>
      <input type="text" name="street">
    </div>
    <div class="order_field-postalcode form-container__box">
      <label for="postalcode">Postnr:</label><br>
      <input type="number" name="postalcode">
    </div>
    <div class="order_field-city form-container__box">
      <label for="city">Ort:</label><br>
      <input type="text" name="city">
    </div>
    <div class="order_field-submit form-container__submit">
      <input type="submit" value="Skicka beställning" class="form-container__submit-button">
    </div>
  </form>
</section>
<script type="application/javascript" src="orderpage.js"></script>
<?php
require_once '../footer.php';
?>