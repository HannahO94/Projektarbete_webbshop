<?php 
// $id = htmlspecialchars($_GET['id']);

// Hämtar alla kolumner från tabellen "webshop_products" i db
$stmt = $db->prepare("SELECT  
                    `title`, 
                    `price` 
                    FROM `webshop_products` 
                    WHERE productid=:productid");
$stmt->bindParam(':productid', $id);
$stmt->execute();

$products = array();

$row = $stmt->fetch(PDO::FETCH_ASSOC);

    $title = htmlspecialchars($row['title']);
    $price = htmlspecialchars($row['price']);
?>

<script src="add-product.js"></script>