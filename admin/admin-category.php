<?php 
require_once 'header.php';
require_once '../config/db.php';

$sql = "SELECT * FROM webshop_categories"; 
$stmt = $db->prepare($sql);
$stmt->execute();

$list = '<ul>';

while($row = $stmt->fetch(PDO::FETCH_ASSOC)){  
    $category = htmlspecialchars($row['category']);
    $id = htmlspecialchars($row['categoryid']);
    $list .= "<li> $category <button><a href='admin-update-category.php?id=$id'>Uppdatera</a></button><button><a href='admin-delete-category.php?id=$id' onclick='return myFunction()' id='delete'>Ta bort</a></button></li>";

    }
$list .= '</ul>';  

 ?>

<h1>Kategorier</h1>
<a href="index.php">Hem</a>
<h3>Kategori:</h3>
<?php echo $list;?>

<h3>Lägg till en kategori</h3>
<?php
require_once "admin-create-category.php";?>


 <script>
    function myFunction() {
        let remove = confirm("Är du säker på att du vill radera inlägget");
        if (remove == false) {
            return false;
        } 
    }  
</script> 

    <?php require_once "footer.php";?>