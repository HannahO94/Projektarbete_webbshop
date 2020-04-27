<?php
require_once "../header_extern.php";
require_once "../config/db.php";
$productimg = "";
// Hämtar kategori-id som valdes på kategorisidan
$id = htmlspecialchars($_GET['id']);

// Hämtar alla kolumner från tabellen "webshop_products" i db
$stmt = $db->prepare("SELECT  
                    `categoryid`,
                 `productid`,
                    `title`, 
                    `description`, 
                    `quantity`, 
                    `price`,
                    `productimg`
                    FROM `webshop_products` 
                    WHERE productid=:productid");
$stmt->bindParam(':productid', $id);
$stmt->execute();

echo "<div class='product-info'>";

// Hämtar raderna som finns i varje kolumn
$row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    $categoryid = htmlspecialchars($row['categoryid']);
    $productid = htmlspecialchars($row['productid']);
    $title = htmlspecialchars($row['title']);
    $description = htmlspecialchars($row['description']);
    $quantity = htmlspecialchars($row['quantity']);
    $price = htmlspecialchars($row['price']);
    $productimg = unserialize($row['productimg']);   


?>
<section class="product">
<h1 class="product__prod-title"><?= $title ?></h1>
<p class="product__prod-description">
<?= $description ?>
</p>

<div class="product__img-container"><?php
if(!empty($productimg)){
foreach ($productimg as $key => $value) {
        echo "<img src='../images/$value' width='200px' class='product_img' style='margin: 8px;'>";
        }
    }
    else {
        echo "ingen bildfil finns tillgänglig";
  
    }?>
</div>

<div class="product__prod-price"><strong>Pris:</strong> <?= $price ?> kr</div>

<?php 
 // Om det finns i lagret eller inte
 if ($quantity == "0") {
    $any_items = "Finns EJ i lager";
    echo "<div class='product__inventory' style='color: red'>" . $any_items . "</div>";
    echo "<button id='cart-btn$productid' class='add-to-cart' style='background-color: grey; color: black;' disabled>Lägg i varukorgen</button>";
} else {
    $any_items = "I lager: " . $quantity . " st";
    echo "<div class='product__inventory' style='color: green'>" . $any_items . "</div>
    <p style='display:none'>$price</p>
    <p style='display:none;'>$quantity</p>
    <p style='display:none'>$productid</p>";

    echo "
    <label for='cartQty'>Antal:</label>
    <input type='number' id='cartQty' name='cartQty' min='1' max='$quantity' value='1'> 
    <button id='cart-btn$productid' class='cart-btn'>Lägg i varukorgen</button>";
}
echo "</div>";
?>

</section>

<?php
echo "<a class='product__back-btn' href='../categorypage/categorypage.php?id=" . $categoryid ."'>Tillbaka</a>";

require_once '../footer.php';
?>