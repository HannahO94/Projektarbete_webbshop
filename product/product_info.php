<?php
require_once "../header_extern.php";
require_once "../config/db.php";

// Hämtar kategori-id som valdes på kategorisidan
$id = htmlspecialchars($_GET['id']);

// Hämtar alla kolumner från tabellen "webshop_products" i db
$stmt = $db->prepare("SELECT  
                    `categoryid`,
                    `title`, 
                    `description`, 
                    `quantity`, 
                    `price` 
                    FROM `webshop_products` 
                    WHERE productid=:productid");
$stmt->bindParam(':productid', $id);
$stmt->execute();

echo "<div class='product-info'>";

// Hämtar raderna som finns i varje kolumn
$row = $stmt->fetch(PDO::FETCH_ASSOC);

    $categoryid = htmlspecialchars($row['categoryid']);
    $title = htmlspecialchars($row['title']);
    $description = htmlspecialchars($row['description']);
    $quantity = htmlspecialchars($row['quantity']);
    $price = htmlspecialchars($row['price']);

?>
<section class="product">
<h1 class="product__prod-title"><?= $title ?></h1>

<h2 class="product__prod-description-header">Beskrivning</h2>

<p class="product__prod-description">
<?= $description ?>
</p>

<div class="product__img-container">
    <img src="" alt="Bild på spelet" class="product__img-container__img">
</div>

<span class="product__prod-price">Pris: <?= $price ?> kr</span>

<?php 
 // Om det finns i lagret eller inte
 if ($quantity == "0") {
    $any_items = "Finns EJ i lager";
    echo "<span class='product__inventory' style='color: red'>" . $any_items . "<span>";
} else {
    $any_items = "I lager: " . $quantity . " st";
    echo "<span class='product__inventory' style='color: green'>" . $any_items . "<span>";
}
    echo "</div>";
?>

</section>

<button onclick="btnClick()" name="submit" class="add-to-cart">Lägg i varukorgen</button>

<?php
echo "<a href='../categorypage/categorypage.php?id=" . $categoryid ."'>Tillbaka</a>";

require_once '../footer.php';
?>