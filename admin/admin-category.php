<?php 
require_once 'header.php';
require_once '../config/db.php';

$sql = "SELECT * FROM webshop_categories"; 
$stmt = $db->prepare($sql);
$stmt->execute();

$list = '<ul class="category-list">';

while($row = $stmt->fetch(PDO::FETCH_ASSOC)){  
    $category = htmlspecialchars($row['category']);
    $id = htmlspecialchars($row['categoryid']);
    $list .= "<li class='category-list__item'><p class='category-list__item-text'> $category </p><div class='category-list__buttons'><button class='category-list__update-button'><a href='admin-update-category.php?id=$id'>Uppdatera</a></button><button class='category-list__delete-button'><a href='admin-delete-category.php?id=$id' onclick='return myFunction()' id='delete'>Ta bort</a></button></div></li>";

    }

    $list .= '</ul>';  

    if($_SERVER['REQUEST_METHOD'] === 'POST') :
        
        $sql = "INSERT INTO webshop_categories (category, image)
                VALUES (:category, :image) ";
           
        $stmt = $db->prepare($sql);

        
        $category = htmlspecialchars($_POST['category']);
        $image = $_FILES['category-img']['name'];
        $target = "../images/".basename($image);
        

        
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':image', $image);

    endif;
 ?>
 
<div class="page__backround">
<h1>Kategorier</h1>
<?php echo $list;?>

<?php
require_once "admin-create-category.php";

require_once "../footer.php"?>
 <script>
    function myFunction() {
        let remove = confirm("Är du säker på att du vill radera kategorin");
        if (remove == false) {
            return false;
        } 
    }  
</script> 

