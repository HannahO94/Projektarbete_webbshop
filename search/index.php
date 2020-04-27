<?php
require_once '../config/db.php';
require_once '../header_extern.php';


?>

<section>
<h1 class="header--center">Sökresultat</h1>
<br><br>

<!--i nedan div mha php rita ut produktkort för varje produkt i sökresultatet-->
<div id="searched-result" class="search-result">

<?php

//Hämta arrayen med produkt-id från sökresultatet 
  $search = htmlspecialchars($_GET['id']);

  if ($search === ""){
    echo "<h3 id='search-noResult'>Vi har tyvärr inte det spelet du söker, testa gärna en ny sökning!</h3>";
  }else {

  
  //Hämta sökresultatets produkter från databasen
  $sql = "SELECT * 
          FROM webshop_products
          WHERE productid IN ({$search})";
  $stmt = $db->prepare($sql);
  $stmt->execute();
  

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
//datumkontroll, rea eller ny
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

        <button class='cart-btn product_card-btn'><a href= '../order/orderpage.php? id=$productid' </a>Lägg i varukorg</button>
      </div>";

  }else if($diffDays > 60){

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
  } else {
    
    echo
    "<div class='product_card'>
    <a href= '../product/product_info.php? id=$productid' 
    class='product_title'>$title</a>
    <p class='product_price'>Pris: $price kr</p>
    <p class='any-items'>$any_items</p>
    
    <button class='cart-btn product_card-btn'><a href= '../order/orderpage.php? id=$productid' </a>Lägg i varukorg</button>
    </div>";
  };

    endwhile;


  }

    ?>

</div>
<br>
<br>
<button class="btn-back"><a href="../index.php">Tillbaka till startsidan</a></button>
</section>

<?php
require_once "../footer.php"
?>