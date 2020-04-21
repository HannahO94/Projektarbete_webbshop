<?php
require_once '../header_extern.php';
require_once '../config/db.php';


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $currentCategory = htmlspecialchars($_GET['id']);
}

//måste även lägga till ett WHERE-villkor som matchar den aktuella kategorin, variabeln ovan
$stmt = $db->prepare("SELECT * FROM webshop_products WHERE categoryid = $currentCategory");
$stmt->execute();

?>

<!--hero-sektion och sektion för produkter-->
<section class="hero">
  <div class="shoppingcart">
  </div>
  <div class="categorypage_logo img-container">
    <img class="img-container__img" src="category.jpg" alt="Kategoribild">
  </div>
</section>
<section>
  <h1 class="category_name">Kategorinamn</h1>
  <br>
  <br>
  <!--här hämtas kategoriens produkter från databas-->
  <div class="categorypage_products">
    <?php
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) :
      $title = htmlspecialchars($row['title']);
      $price = htmlspecialchars($row['price']);
      $productid = htmlspecialchars($row['productid']);
      $quantity = htmlspecialchars($row['quantity']);

      if ($quantity == "0") {
        $any_items = "<span>Finns EJ i lager</span>";
      } else {
        $any_items = "I lager: " . $quantity . " st";
      }

      echo
        "<div class='product_card'>
              <a href= '../product/product_info.php? id=$productid' 
              class='product_title'>$title</a>
              <p class='product_price'>Pris: $price kr</p>
              <p class='any-items'>$any_items</p>

            <button class='cart-btn product_card-btn'><a href= '../order/orderpage.php? id=$productid' </a>Lägg i varukorg</button>
          </div>";

    endwhile;
    ?>

  </div>
  <br>
  <br>
  <button class="btn-back"><a href="../index.php">Tillbaka till startsidan</a></button>
</section>

<?php require_once '../footer.php'; ?>