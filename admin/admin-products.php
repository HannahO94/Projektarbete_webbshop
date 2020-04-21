<?php

require_once 'header.php';
require_once '../config/db.php';

?>

<h2>Produkter</h2>

<?php

$sql = "SELECT * FROM webshop_products";
$stmt = $db->prepare($sql);
$stmt->execute();

$output ="<ul>";
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $productid = htmlspecialchars($row['productid']);
    $categoryid = htmlspecialchars($row['categoryid']);
    $product = htmlspecialchars($row['title']);

    $output .= "<li>$product<button><a href='admin-update-product.php?id=$productid'>Uppdatera</a></button><button><a href='admin-delete-product.php?id=$productid' onclick='return myFunction()' id='delete'>Ta bort</a></button></li>";
}

$output .="</ul>";

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