<?php

//Ange innehållstypen JSON
header("Content-Type: application/json; charset=UTF-8");

//Skapa uppkoppling mot databasen
require_once('../config/db.php');

//Hämta data från databasen via SQL-query
$sql = "SELECT 
            P.productid, 
            P.categoryid,
            P.title, 
            P.description,
            P.price,
            P.quantity
        FROM 
            webshop_products as P";

$stmt = $db->prepare($sql);
$stmt->execute();

//Om det finns några produkter(tabellrader) i databasen
if ($stmt->rowCount() > 0) {

  //Deklarera en tom PHP-array
  $products = array();

  //Lägg till varje produkt i PHP-arrayen 
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) :

    $productid = htmlspecialchars($row["productid"]);
    $categoryid = htmlspecialchars($row["categoryid"]);
    $title = htmlspecialchars($row["title"]);
    $description = htmlspecialchars($row["description"]);
    $price = htmlspecialchars($row["price"]);
    $quantity = htmlspecialchars($row["quantity"]);


    $product = array(
      "productid" => $productid,
      "categoryid" => $categoryid,
      "title" => $title,
      "description" => $description,
      "price" => $price,
      "quantity" => $quantity,
    );

    array_push($products, $product);

  endwhile;


  //Konvertera PHP-arrayen till JSON-data och skriv ut datan
  $jsonData = json_encode(
    $products,
    JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT
  );

  echo $jsonData;
} else {
  echo "Det finns inga produkter";
}
