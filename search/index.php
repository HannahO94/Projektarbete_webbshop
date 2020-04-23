<?php
require_once '../config/db.php';
require_once '../header_extern.php';


//Hämta arrayen med produkt-id från sökresultatet 
$search = $_GET['id'];

  //Hämta sökresultatets produkter från databasen
  $sql = "SELECT * 
          FROM webshop_products
          WHERE productid IN ({$search})";
  $stmt = $db->prepare($sql);
  $stmt->execute();
?>

<section>
<h1 class="header--center">Sökresultat</h1>
<br><br>

<!--i nedan div mha php rita ut produktkort för varje produkt i sökresultatet-->
<div id="searched-result" class="search-result">
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

<?php
require_once "../footer.php"
?>