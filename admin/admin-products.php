<?php

require_once 'header.php';
require_once '../config/db.php';

?>

<h2>Produkter</h2>

<?php



$sql="SELECT `productid`, `title`, `category` 
FROM `webshop_products` 
LEFT JOIN webshop_categories 
ON webshop_products.categoryid = webshop_categories.categoryid 
ORDER BY `webshop_categories`.`category` ASC";

$stmt = $db->prepare($sql);
$stmt->execute();

$output ="<table><tr>
                    <th>Produkt</th>
                    <th>Kategori</th>
                    <th>Redigera</th></tr>";
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $productid = htmlspecialchars($row['productid']);
    $category = htmlspecialchars($row['category']);
    $product = htmlspecialchars($row['title']);

    $output .= "<tr>
                <td> $product </td>
                <td>$category</td>
                <td><button><a href='admin-update-product.php?id=$productid'>Uppdatera</a></button>
                <button><a href='admin-delete-product.php?id=$productid' onclick='return myFunction()' id='delete'>Ta bort</a></button></td>
                </tr> ";


}

$output.= "</table>";

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

<button><a href="admin-add-products.php">Lägg till produkt</a></button>
<?php require_once "../footer.php";?>