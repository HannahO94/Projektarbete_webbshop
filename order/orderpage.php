<?php
require_once '../header_extern.php';
require_once '../config/db.php';

//Hämtar det produkt-id som valdes
$currentProductId = htmlspecialchars($_GET['id']);

//Hämtar aktuell produktrad i databasen, som matchar den valda produkten
$stmt = $db->prepare("SELECT * FROM webshop_products WHERE productid = $currentProductId");
$stmt->execute();

?>

<section class="freigt-info">
  <p>Fri frakt över 500 kr.</p>
  <p>Alla inom Stockholm har fri frakt.</p>
</section>

<section class="shoppingcart">
  <h1>Din varukorg</h1>
  <div id="cart-items" class="cart-items">

    <!--Här visas produkter i varukorgen, eller en text "Inga produkter i varukorgen" om inga har valts än -->

    <!-- PHP-koden nedan är bara ett test 
    för att se att knappen "Lägg i varukorg" skickar rätt produkt 
    och kan hämta/visa utvalda uppgifter:</h4> -->
    <?php
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) :
      $productId = htmlspecialchars($row['productid']);
      $title = htmlspecialchars($row['title']);
      $price = htmlspecialchars($row['price']);

      echo
        "<p class='product_id'>Produkt-id: $productId</p>
        <p class='product_price'>Pris: $price kr</p>  
         <p class='product_title'>Titel: $title</p>";

    endwhile;

    ?>
  </div>

</section><br>

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

<?php
require_once '../footer.php';
?>