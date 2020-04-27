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

  <!--Här visas produkter i varukorgen via JS -->
  <table>
    <thead>
      <th>Produkt</th>
      <th>Pris/st</th>
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

  <!-- <form action="order-confirmation.php" method="POST" id="contact-form" class="form-container"> -->
    <form action="send-order.php" method="POST" id="contact-form" class="form-container" onsubmit="return validateForm(event)">
    <!--FK: Formulärvalideringen (som hämtas från validate_order.js) verkar funka 
    utan onsubmit-anrop inuti form-taggen. Därav den utkommenterade kodraden ovan-->

    <div class="order_field-name form-container__box">
      <label for="name">För- och efternamn:</label><br>
      <!-- <input type="text" name="name" id="name" required> -->
      <input type="text" name="name" id="name" onblur="validateName()">
      <br>
      <span class="nameValidationText"></span>
    </div>

    <div class="order_field-email form-container__box">
      <label for="email">E-post:</label><br>
      <!-- <input type="text" name="email" id="email" required> -->
      <input type="text" name="email" id="email" onblur="validateEmail()" placeholder="exempel@test.com">
      <br>
      <span class="emailValidationText"></span>
    </div>

    <div class="order_field-phone form-container__box">
      <label for="phone">Mobilnummer:</label><br>
      <input type="text" name="phone" id="phone" onblur="validatePhone()" placeholder="(ex. 0701234567)">
      <br>
      <span class="phoneValidationText"></span>
    </div>

    <div class="order_field-street form-container__box">
      <label for="street">Gatuadress:</label><br>
      <input type="text" name="street" id="street" onblur="validateStreet()">
      <br>
      <span class="streetValidationText"></span>
    </div>

    <div class="order_field-postalcode form-container__box">
      <label for="zip">Postnr:</label><br>
      <!-- <input type="number" name="zip" id="zip" required> -->
      <input type="text" name="zip" id="zip" onblur="validateZipcode()" placeholder="(ex. 12345)">
      <br>
      <span class="zipcodeValidationText"></span>
    </div>

    <div class="order_field-city form-container__box">
      <label for="city">Ort:</label><br>
      <input type="text" name="city" id="city" onblur="validateCity()">
      <br>
      <span class="cityValidationText"></span>
    </div>

    <input type="hidden" name="status" id="status" value="1">

    <div class="order_field-submit form-container__submit">
      <input type="submit" value="Skicka beställning" class="form-container__submit-button">
    </div>
  </form>

</section>

<!-- <script type="application/javascript" src="show-order-details.js"></script> -->
<!-- <script type="application/javascript" src="validate_order.js"></script> -->
<!-- <script type="application/javascript" src="updateProduct.js"></script>-->

<?php
require_once "../footer.php";
?>