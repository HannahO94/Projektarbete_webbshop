
<?php
//Hämtar det produkt-id som valdes
$clickedProductId = $_GET['id'];
$jsonArray = array();
//Hämtar aktuell produktrad i databasen, som matchar den valda produkten
$stmt = $db->prepare("SELECT * FROM webshop_products WHERE productid = :productid");
$stmt->bindParam(':productid', $clickedProductId);
$stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) :
      $productId = htmlspecialchars($row['productid']);
      $title = htmlspecialchars($row['title']);
      $price = htmlspecialchars($row['price']);
      //Konverterar den associativa arrayen till en JSON-array och spar ner i en variabel 
      $jsonArray = json_encode($row);
      //TEST: Skriver ut JSON-arrayen
    endwhile;
    echo $jsonArray;
?>
