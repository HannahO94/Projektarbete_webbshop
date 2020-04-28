<?php
  require_once '../second_header_extern.php';
require_once '../config/db.php';
$sql = "SELECT * FROM webshop_products";
$stmt = $db->prepare($sql);
$stmt->execute();
?>

<h2>Sista chansen, passa på!</h2>

<div class="product_container">

<?php
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) :
  $title = htmlspecialchars($row['title']);
  $price = htmlspecialchars($row['price']);
  $productid = htmlspecialchars($row['productid']);
  $quantity = htmlspecialchars($row['quantity']);
  $date = htmlspecialchars($row['date']);

  //nytt outlet pris
  $percentage = 0.9;
  $outletPrice = ceil($price * $percentage);
  $savings = $price - $outletPrice;

  //finns eller inte i lager
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

  if($diffDays > 60){

    echo
    "<div class='product_card'>
          <p class='product_price-outlet'>Pris: $outletPrice kr</p>
          <a href= '../product/product_info.php? id=$productid' 
          class='product_title'>$title</a>
          <p class='product_price-old'>Normalpris: $price kr</p>
          <p class='product_price-savings'>Du sparar: $savings kr! (-10%) </p> 
          <p class='any-items'>$any_items</p>
          <p style='display:none;'>$price</p>
          <p style='display:none;'>$outletPrice</p>
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
</div>

<button class="btn-back"><a href="../index.php">Tillbaka till startsidan</a></button>

<?php
require_once "../footer.php"
?>