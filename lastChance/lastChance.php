<?php
  require_once '../second_header_extern.php';
require_once '../config/db.php';
$sql = "SELECT * FROM webshop_products";
$stmt = $db->prepare($sql);
$stmt->execute();


$sqlDate = "SELECT * FROM `webshop_products` ORDER BY date ASC LIMIT 3";
$stmtDate = $db->prepare($sqlDate);
$stmtDate->execute();
?>

<h2>Sista chansen, passa på!</h2>

<div class="product_container">

<?php

while ($row = $stmtDate->fetch(PDO::FETCH_ASSOC)) :
  $outletTitle = htmlspecialchars($row['title']);
  $outletOrigPrice = htmlspecialchars($row['price']);
  $outletProductid = htmlspecialchars($row['productid']);
  $outletQuantity = htmlspecialchars($row['quantity']);
  $outletDate = htmlspecialchars($row['date']);

  //nytt outlet pris
  $percentage = 0.9;
  $outletPrice = ceil($outletOrigPrice * $percentage);
  $savings = $outletOrigPrice - $outletPrice;

  //finns eller inte i lager
  if ($outletQuantity == "0") {
    $any_items = "<span>Finns EJ i lager</span>";
  } else {
    $any_items = "I lager: " . $outletQuantity . " st";
  }

    echo
    "<div class='product_card'>
          <p class='product_price-outlet'>Pris: $outletPrice kr</p>
          <a href= '../product/product_info.php? id=$outletProductid' 
          class='product_title'>$outletTitle</a>
          <p class='product_price-old'>Normalpris: $outletOrigPrice kr</p>
          <p class='product_price-savings'>Du sparar: $savings kr! (-10%) </p> 
          <p class='any-items'>$any_items</p>
          <p style='display:none;'>$outletOrigPrice</p>
          <p style='display:none;'>$outletPrice</p>
          <p style='display:none;'>$outletQuantity</p>
          <p style='display:none'>$outletProductid</p>

          <label for='cartQty'>Antal:</label>";
          if ($outletQuantity == "0") {
            $any_items = "Finns EJ i lager";
            echo "<div class='product__inventory' style='color: red'>" . $any_items . "</div>
            <button id='cart-btn$outletProductid' class='add-to-cart' style='background-color: grey; color: black;' disabled>Lägg i varukorgen</button>";
        }else{
          echo "<input type='number' id='cartQty' name='cartQty' min='1' max='$outletQuantity' value='1'>
           <button class='cart-btn product_card-btn'>Lägg i varukorg</button>";
        }
      echo "</div>";

endwhile;
?>
</div>

<button class="btn-back"><a href="../index.php">Tillbaka till startsidan</a></button>

<?php
require_once "../footer.php"
?>