<?php
require_once '../header_extern.php';
require_once '../config/db.php';
?>

<section class="freight-info">
  <p>Fri frakt över 500 kr.</p>
  <p>Alla inom Stockholm har fri frakt.</p>
</section>

<?php
// //Hämtar det produkt-id som valdes
// $clickedProductId = htmlspecialchars($_GET['id']);
// $jsonArray = array();
// //Hämtar aktuell produktrad i databasen, som matchar den valda produkten
// $stmt = $db->prepare("SELECT * FROM webshop_products WHERE productid = :productid");
// $stmt->bindParam(':productid', $clickedProductId);
// $stmt->execute();
?>

<!--Varukorgen-->
<section class="shoppingcart">

  <h1>Din varukorg</h1>
  <div id="cart-items" class="cart-items">

    <!-- Här visas produkter i varukorgen via JS
    <?php
    // while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) :
    //   $productId = htmlspecialchars($row['productid']);
    //   $title = htmlspecialchars($row['title']);
    //   $price = htmlspecialchars($row['price']);
    //   echo
    //     "<p class='product_id'>Produkt-id: $productId</p>
    //     <p class='product_price'>Pris: $price kr</p>  
    //      <p class='product_title'>Titel: $title</p>";

    //   //TEST: Skriver ut en associativ array med de valda attributen från databastabellen (se "SELECT .. FROM .." ovan)
    //   print_r($row);
    //   //Konverterar den associativa arrayen till en JSON-array och spar ner i en variabel 
    //   $jsonArray = json_encode($row);
    //   //TEST: Skriver ut JSON-arrayen
    //   echo $jsonArray;
    // endwhile;

    ?>
  </div>

  //FÖRSÖK ATT SPARA PRODUKTER I LOCALSTORAGE
  //Hur får vi till att JSON-arrayen kan användas här i scriptet (tillsammans med javascript)?
  //(verkar ju ha med AJAX att göra som ni redan varit inne på)
  let jsonArray = "<?php echo $jsonArray; ?>";
  //console.log(JSON.parse($jsonArray)); //Funkar inte 
  //Skapa en variabel som kan lagra alla valda produkter i localstorage 
  let savedProducts = new Array;
  let ajax = new XMLHttpRequest();

// ajax.onreadystatechange = function () {
//   if (this.readyState === 4 && this.status === 200) {
//    //Om det ännu inte finns någon array i localstorage - Skapa en tom array
//     if (localStorage.getItem('savedProducts') == null) {
//     //Annars - om det redan finns en array i localstorage - hämta arrayen med JSON.parse
//     } else {
//       savedProducts = JSON.parse(localStorage.getItem("savedProducts"));
//   }
// }
// //ajax.open("GET, "orderpage.php")
//   // Spara den tillagda produkten i localstorage-arrayen
//   savedProducts.push(jsonArray);
  //console.log(savedProducts);
  // Skicka den uppdaterade arrayen till localStorage
  localStorage.setItem("products", JSON.stringify(jsonArray));
 -->

</section>
<br>
<!--Kontaktformulär för beställning-->
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