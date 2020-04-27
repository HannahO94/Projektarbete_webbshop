<?php
  require_once '../header_extern.php';
require_once '../config/db.php';
$sql = "SELECT * FROM webshop_products";
$stmt = $db->prepare($sql);
$stmt->execute();

  echo "<h2>Här hittar du våra nyaste varor</h2>";
  
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) :
  $title = htmlspecialchars($row['title']);
  $price = htmlspecialchars($row['price']);
  $productid = htmlspecialchars($row['productid']);
  $quantity = htmlspecialchars($row['quantity']);
  $date = htmlspecialchars($row['date']);

  

  if ($quantity == "0") {
    $any_items = "<span>Finns EJ i lager</span>";
  } else {
    $any_items = "I lager: " . $quantity . " st";
  }

  //räkna ut skillnaden mellan datens datum och produktens datum
  $now = date("yy-m-d");
  $dateNow=date_create($now);
  $dateProd=date_create($date);
  $diff=date_diff($dateProd,$dateNow);
  $diffDays = $diff->format('%R%a days'); 
  //echo $diffDays;

  if($diffDays < 7){
    //echo "less then two weeks";
    echo
    "<div class='product_card'>
          <h3 class='product_price-new'>Ny!</h3>
          <a href= '../product/product_info.php? id=$productid' 
          class='product_title'>$title</a>
          <p class='product_price'>Pris: $price kr</p>
          <p class='any-items'>$any_items</p>
          <p style='display:none'>$price</p>
          <p style='display:none;'>$quantity</p>
          <p style='display:none'>$productid</p>

          <label for='cartQty'>Antal:</label>";
          if ($quantity == "0") {
            $any_items = "Finns EJ i lager";
            echo "<div class='product__inventory' style='color: red'>" . $any_items . "</div>
            <button id='cart-btn$productid' class='add-to-cart' style='background-color: grey; color: black;' disabled>Lägg i varukorgen</button>";
        }else{
          echo "<input type='number' id='cartQty' name='cartQty' min='1' max='$quantity' value='1'>
           <button class='cart-btn product_card-btn'>Lägg i varukorg</button>";
        }
      echo "</div>";
  };

  

endwhile;
?>
<button class="btn-back"><a href="../index.php">Tillbaka till startsidan</a></button>

<?php
require_once "../footer.php"
?>