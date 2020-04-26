<?php
require_once '../header_extern.php';
require_once '../config/db.php';
?>


<section class="freight-info">
  <p>Fri frakt över 500 kr.</p>
  <p>Alla inom Stockholm har fri frakt.</p>
</section>


<!--Varukorgen-->
<section id="shoppingcart">

  <h1>Din varukorg</h1>
  <!--<div id="cart-items" class="cart-items">-->

    <!-- Här visas produkter i varukorgen via JS -->
    <table>
      <thead>
        <th>Produkt</th>
        <th>Pris</th>
        <th>Ta bort</th>
        <th colspan="3">Antal</th>
      </thead>
      <tbody id="shoppingCart" class="shoppingCart">
        <!--här jobbar drawCart()-->
      </tbody>
    </table>
    <br>
    <h3 id="orderValue"></h3>
  <br>
  <button id="empty-cart">Töm varukorgen</button>
  <br>
  <br>
</section>


<section class="order-form">

  <h1>Dina uppgifter</h1>

  <form action="send-order.php" method="POST" id="contact-form" class="form-container">
    <!-- <form action="#" method="POST" id="contact-form" class="form-container" onsubmit="return validateForm(event)">
 -->
    <div class="order_field-name form-container__box">
      <label for="name">För- och efternamn:</label><br>
      <input type="text" name="name" id="name" required>
      <!-- <input type="text" name="name" id="name" onblur="validateName()" required> -->
      <br>
      <span class="nameValidationText"></span>
    </div>

    <div class="order_field-email form-container__box">
      <label for="email">E-post:</label><br>
      <input type="text" name="email" id="email" required>
      <!-- <input type="text" name="email" id="email" onblur="validateEmail()" required> -->
      <br>
      <span class="emailValidationText"></span>
    </div>

    <div class="order_field-mobile form-container__box">
      <label for="mobile">Mobilnummer:</label><br>
      <input type="number" name="phone" id="phone" required>
    </div>

    <div class="order_field-street form-container__box">
      <label for="street">Gatuadress:</label><br>
      <input type="text" name="street" id="street" required>
    </div>

    <div class="order_field-postalcode form-container__box">
      <label for="zip">Postnr:</label><br>
      <input type="number" name="zip" id="zip" required>
      <!-- <input type="number" name="zip" id="zip" onblur="validateZipcode()" required> -->
      <br>
      <span class="zipcodeValidationText"></span>
    </div>

    <div class="order_field-city form-container__box">
      <label for="city">Ort:</label><br>
      <input type="text" name="city" id="city" required>
    </div>

    <input type="hidden" name="status" id="status" value="1">

    <div class="order_field-submit form-container__submit">
      <input type="submit" value="Skicka beställning" class="form-container__submit-button">
    </div>
  </form>

</section>

<!-- <script type="application/javascript" src="orderConfirmation.js"></script> -->

<!--<script type="application/javascript" src="validate_order.js"></script>
<script type="application/javascript" src="updateProduct.js"></script>-->

<?php
require_once "../footer.php";
?>