<?php
require_once '../header_extern.php';
require_once "../config/db.php";

$id = htmlspecialchars($_GET['productid']);

$stmt = $db->prepare("SELECT  
                    `title`, 
                    `description`, 
                    `quantity`, 
                    `price` 
                    FROM `webshop_products` 
                    WHERE productid=:productid");
$stmt->bindParam(':productid', $id);
$stmt->execute();

echo "<div class='product-info'>";

$row = $stmt->fetch(PDO::FETCH_ASSOC);

    $title = htmlspecialchars($row['title']);
    $description = htmlspecialchars($row['description']);
    $quantity = htmlspecialchars($row['quantity']);
    $price = htmlspecialchars($row['price']);

    if ($quantity == "0") {
        $any_items = "Finns EJ i lager";
    } else {
        $any_items = "Finns i lager";
    }
?>

<h1><?= $title ?></h1>

<div class="img-container">
    <img src="" alt="Bild på spelet" class="img-container__img">
</div>

<h2>Beskrivning</h2>

<p class="description">
<?= $description ?>
</p>

<span>Pris: <?= $price ?> kr</span>

<?php 
    echo "<span class='inventory'>" . $any_items . "<span>";

echo "</div>";
?>

<button class="cart-btn">Lägg i varukorgen</button>

<?php 
require_once '../footer_extern.php';
?>