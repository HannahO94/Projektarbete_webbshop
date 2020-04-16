<?php

//Ange innehållstypen JSON
header("Content-Type: application/json; charset=UTF-8");

//Skapa uppkoppling mot databasen
require_once('../config/db.php');

//Hämta data från databasen via SQL-query
$sql = "SELECT 
            categoryid, 
            category,
            image
        FROM 
            webshop_categories";

$stmt = $db->prepare($sql);
$stmt->execute();

//Om det finns några kategorier (tabellrader) i databasen
if ($stmt->rowCount() > 0) {

  //Deklarera en tom PHP-array
  $categories = array();

  //Lägg till varje kategori i PHP-arrayen 
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) :
    $category = array(
      "categoryid" => htmlspecialchars($row["categoryid"]),
      "category" => htmlspecialchars($row["category"]),
      "image" => htmlspecialchars($row["image"])
    );

    array_push($categories, $category);

  endwhile;

  //Konvertera PHP-arrayen till JSON-data och skriv ut datan
  $jsonData = json_encode(
    $categories,
    JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT
  );

  echo $jsonData;
} else {
  echo "Det finns inga kategorier";
}
