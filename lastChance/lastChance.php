<?php
  require_once '../header_extern.php';
require_once '../config/db.php';
$sql = "SELECT * FROM webshop_products";
$stmt = $db->prepare($sql);
$stmt->execute();

  echo "<h2>Sista chansen, passa på!</h2>";

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

    //här måste man skicka nytt pris till databasen!
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
      print_r($_POST);
      $productid = htmlentities($_POST['productid']);
      $outletPrice = htmlentities($_POST['price']);
    
      $sql = "UPDATE webshop_products 
              SET price = :price
              WHERE productid = :productid";
    
      $stmt = $db->prepare($sql);
      $stmt->bindParam(':id', $id);
      $stmt->bindParam(':price', $outletPrice);
    
      $stmt->execute();
      //header('Location:index.php');
      exit;
    }


    echo
    "<div class='product_card'>
          <p class='product_price-outlet'>Pris: $outletPrice kr</p>
          <a href= '../product/product_info.php? id=$productid' 
          class='product_title'>$title</a>
          <p class='product_price-old'>Normalpris: $price kr</p>
          <p class='product_price-savings'>Du sparar: $savings kr! (-10%) </p> 
          <p class='any-items'>$any_items</p>

        <button class='cart-btn product_card-btn'><a href= '../order/orderpage.php? id=$productid' </a>Lägg i varukorg</button>
      </div>";
  };

  

endwhile;

?>
<button class="btn-back"><a href="../index.php">Tillbaka till startsidan</a></button>

<?php
require_once "../footer.php"
?>