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
<section id="shoppingcart">

  <h1>Din varukorg</h1>
  <div id="cart-items" class="cart-items">

    <!-- Här visas produkter i varukorgen via JS -->
    <?php


    ?>

</section>

<section class="order-form">
  <h1>Dina uppgifter</h1>
  <form action="#" method="POST" class="form-container" onsubmit="return validateForm(event)">
    <div class="order_field-name form-container__box">
      <label for="name">För- och efternamn:</label><br>
      <input type="text" name="name" id="name" onblur="validateName()" required>
      <br>
      <span class="nameValidationText"></span>
    </div>
    <div class="order_field-email form-container__box">
      <label for="email">E-post:</label><br>
      <input type="text" name="email" id="email" onblur="validateEmail()" required>
      <br>
      <span class="emailValidationText"></span>
    </div>
    <div class="order_field-mobile form-container__box">
      <label for="mobile">Mobilnummer:</label><br>
      <input type="number" name="mobile" required>
    </div>
    <div class="order_field-street form-container__box">
      <label for="street">Gatuadress:</label><br>
      <input type="text" name="street" required>
    </div>
    <div class="order_field-postalcode form-container__box">
      <label for="zipcode">Postnr:</label><br>
      <input type="number" name="zipcode" id="zipcode" onblur="validateZipcode()" required>
      <br>
      <span class="zipcodeValidationText"></span>
    </div>
    <div class="order_field-city form-container__box">
      <label for="city">Ort:</label><br>
      <input type="text" name="city" required>
    </div>
    <div class="order_field-submit form-container__submit">
      <input type="submit" value="Skicka beställning" class="form-container__submit-button">
    </div>
  </form>
</section>

<script type="application/javascript" src="orderpage.js"></script>


<script src="validate_order.js"></script>
<script type="application/javascript" src="updateProduct.js"></script>

<?php
require_once '../footer.php';
?>