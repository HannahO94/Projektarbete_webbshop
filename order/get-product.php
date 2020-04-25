<?php
require_once "../config/db.php";
$clickedProductId = '';
$id = '';
$someArray = [];
//Hämtar det produkt-id som valdes
if(isset($_GET['id'])){
$clickedProductId = htmlspecialchars($_GET['id']);
echo "<h1>$clickedProductId</h1>";
}
$sql = "SELECT title, price, quantity, productid FROM webshop_products";
$stmt = $db->prepare($sql);
$stmt->execute();

$games = [];

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){    
  $games[] = $row;
};

$id = $clickedProductId;


echo json_encode($games);

?>