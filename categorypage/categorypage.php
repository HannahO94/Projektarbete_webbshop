<?php
require_once '../second_header_extern.php';
require_once '../config/db.php';

$productimg = "";
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $currentCategory = htmlspecialchars($_GET['id']);
}

//måste även lägga till ett WHERE-villkor som matchar den aktuella kategorin, variabeln ovan
$stmt = $db->prepare("SELECT * FROM webshop_products WHERE categoryid = $currentCategory");
$stmt->execute();

$statement = $db->prepare("SELECT `categoryid`, `category`
FROM `webshop_categories` WHERE categoryid = $currentCategory");
$statement->execute();

while ($rowCategory = $statement->fetch(PDO::FETCH_ASSOC)){
$category = htmlspecialchars($rowCategory['category']);
}


?>

<!--hero-sektion och sektion för produkter-->
<section class="hero">
  <div class="shoppingcart">
  </div>
  <!-- <div class="categorypage_logo img-container">
    <img class="img-container__img" src="category.jpg" alt="Kategoribild">
  </div> -->
</section>
<section>
  <h1 class="category_name"><?php echo $category ?></h1>
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
      $date = htmlspecialchars($row['date']);
      $productimg = unserialize($row['productimg']); 

      //nytt outlet pris
      $percentage = 0.9;
      $outletPrice = ceil($price * $percentage);
      $savings = $price - $outletPrice;

      //finns eller inte i lager
        $any_items = "I lager: " . $quantity . " st";
      
      if(!empty($productimg)){
        foreach ($productimg as $key => $value) {
                if($key == 0) {
                  $imgbackground = $value;
                }
            }
      }else if (empty($productimg)) {
        $imgbackground = "";
      }
    

            //datum kontroll, rea eller new
            $now = date("yy-m-d");
            $dateNow=date_create($now);
            $dateProd=date_create($date);
            $diff=date_diff($dateProd,$dateNow);
            $diffDays = $diff->format('%R%a days'); 

            if($diffDays < 7){
              //echo "less then two weeks";
                    if ($quantity == "0") {
                      echo "";
                  } else {
                    echo
                    "<div class='product_card' style=background-image:url('../images/$imgbackground');>
                          <h3 class='product_price-new'>Ny!</h3>
                          <a href= '../product/product_info.php? id=$productid' 
                          class='product_title'>$title</a>
                          <span class='product_price'>Pris: $price kr</span>
                          <p class='any-items'>$any_items</p>
                          <p style='display:none'>$price</p>
                          <p style='display:none;'>$quantity</p>
                          <p style='display:none'>$productid</p>
      
                          <label for='cartQty'>Antal:</label>
                          <input type='number' id='cartQty' name='cartQty' class='cartQty' min='1' max='$quantity' value='1'>
                     <button class='cart-btn product_card-btn'>Lägg i varukorg</button>";
                  }

                echo "</div>";
                //<a href= '../order/orderpage.php? id=$productid' </a>
            }else if($diffDays > 60){

                    if ($quantity == "0") {
                     echo "";
                  }else{
                    echo
              "<div class='product_card' style=background-image:url('../images/$imgbackground');>
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

                    <label for='cartQty'>Antal:</label>
                    <input type='number' id='cartQty' name='cartQty' class='cartQty' min='1' max='$quantity' value='1'>
                     <button class='cart-btn product_card-btn'>Lägg i varukorg</button>";
                  }
                echo "</div>";
                //<a href= '../order/orderpage.php? id=$productid' </a>
            } else {
                if ($quantity == "0") {
                  echo "";
              }else{
                echo
              "<div class='product_card' style=background-image:url('../images/$imgbackground');>
                <a href= '../product/product_info.php? id=$productid' 
                class='product_title'>$title</a>
                <p class='product_price'>Pris: $price kr</p>
                <p class='any-items'>$any_items</p>
                <p style='display:none;'>$price</p>
                <p style='display:none;'>$quantity</p>
                <p style='display:none'>$productid</p>

                <label for='cartQty'>Antal:</label>
                <input type='number' id='cartQty' name='cartQty' class='cartQty' min='1' max='$quantity' value='1'>
                 <button class='cart-btn product_card-btn'>Lägg i varukorg</button>";
              }
            echo "</div>";
         // <a href= '../order/orderpage.php?id=$productid'></a>
            }
    endwhile;
    ?>

  </div>
  <br>
  <br>
  <button class="btn-back"><a href="../index.php">Tillbaka till startsidan</a></button>
</section>


<?php require_once '../footer.php'; ?>
