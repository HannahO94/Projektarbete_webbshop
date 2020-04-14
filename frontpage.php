<?php
// Denna sida hämtar och ritar ut aktuella kategorier från databasen
<<<<<<< Updated upstream
    require_once 'config/db.php';
    $stmt = $db->prepare("SELECT category FROM categories");
    $stmt->execute();
=======
require_once 'config/db.php';
$stmt = $db->prepare("SELECT * FROM webshop_categories");
$stmt->execute();
>>>>>>> Stashed changes

?>    

<!--detta ska vara skalet för en startsida, förstasida för webbshoppen--> 
<section class="hero">
    <div class="shoppingcart">
    </div>
    <div class="frontpage_logo img-container">
    <img class="img-container__img" src="logo.jpg" alt="Logo Spelshoppen">
    </div>
 </section>
 <section class="frontpage_categories">
 <!--här hämtas kategorier från databas-->
 <?php
 while($row = $stmt->fetch(PDO::FETCH_ASSOC)) :
        $category = htmlspecialchars($row['category']);
<<<<<<< Updated upstream
        
        echo 
        "<div class='category_card'>
                <h2 class='category_title'>$category</h2>
=======
        $categoryid = htmlspecialchars($row['categoryid']);

        echo
            "<div class='category_card'>
            <a href= 'categorypage.php? id=$categoryid' 
            class='category_title'>$category</a>
>>>>>>> Stashed changes
        </div>";
   
    endwhile;
?>
 </section>  