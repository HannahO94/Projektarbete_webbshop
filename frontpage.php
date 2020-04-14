<?php
// Denna sida hämtar och ritar ut aktuella kategorier från databasen
require_once 'config/db.php';
$stmt = $db->prepare("SELECT category FROM webshop_categories");
$stmt->execute();

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
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) :
        $category = htmlspecialchars($row['category']);

        echo
            "<div class='category_card'>
                <h2 class='category_title'>$category</h2>
        </div>";

    endwhile;
    ?>
</section>