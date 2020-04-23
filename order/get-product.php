<?php

require_once "../config/db.php";

//Hämtar det produkt-id som valdes
$clickedProductId = $_GET['id'];
$product = [];
//Hämtar aktuell produktrad i databasen, som matchar den valda produkten
$stmt = $db->prepare("SELECT productid, title, price, quantity FROM webshop_products WHERE productid = :productid");
$stmt->bindParam(':productid', $clickedProductId);
$stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) :
    //   $productId = htmlspecialchars($row['productid']);
    //   $title = htmlspecialchars($row['title']);
    //   $price = htmlspecialchars($row['price']);
    //   $quantity = htmlspecialchars($row['quantity']);
    
    $product[] = $row;
 
    
endwhile;
//Konverterar den associativa arrayen till en JSON-array och spar ner i en variabel 
    echo json_encode($product);
?>
