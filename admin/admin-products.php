<?php

require_once 'header.php';
require_once '../config/db.php';

?>

<h2 class="product-head">Produkter</h2>

<?php



$sql="SELECT `productid`, `title`, `category` 
FROM `webshop_products` 
LEFT JOIN webshop_categories 
ON webshop_products.categoryid = webshop_categories.categoryid 
ORDER BY `webshop_categories`.`category` ASC";

$stmt = $db->prepare($sql);
$stmt->execute();


$output ="<section class='table_container'><table class='table_products'><tr class='table_products-row' >
                    <th class='table_products-head'>Produkt</th>
                    <th class='table_products-head'>Kategori</th>
                    <th class='table_products-head'>Redigera</th></tr>";
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $productid = htmlspecialchars($row['productid']);
    $categories = htmlspecialchars($row['category']);
    $product = htmlspecialchars($row['title']);
    $category = strtoupper($categories);

    $output .= "<tr class='table_products-row'>
                <td class='table_products-cell'> $product </td>
                <td class='table_products-cell'>$category</td>
                <td><button class='btn_update-product'><a href='admin-update-product.php?id=$productid'>Uppdatera</a></button>
                <button class='btn_delete-product'><a href='admin-delete-product.php?id=$productid' onclick='return myFunction()' id='delete'>Radera</a></button></td>
                </tr> ";


}

$output.= "</table></section>";

echo $output;

?>



<script>
    function myFunction() {
        
                let remove = confirm("Är du säker på att du vill radera produkten?");
                if (remove == false) {
                    return false;
                } 
                
            }
                    

</script> 

<button class="btn-add-product"><a href="admin-add-products.php">Lägg till produkt</a></button>
<?php require_once "../footer.php";?>