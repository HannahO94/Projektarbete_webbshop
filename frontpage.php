<?php
// Denna sida hämtar och ritar ut aktuella kategorier från databasen
require_once 'config/db.php';

$stmt = $db->prepare("SELECT * FROM webshop_categories");
$stmt->execute();

?>

<!--detta ska vara skalet för en startsida, förstasida för webbshoppen-->
<section class="hero">
    <!-- Ikon för shoppingcart -->
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
        $categoryid = htmlspecialchars($row['categoryid']);
        $image = htmlspecialchars($row['image']);

        // Skapa src till img-taggen
        if (empty($image))
            $image = "images/no-image-available.png";
        else
            $image = "images/$image";


        echo
            "<div class='category_card img_wrapper'>
            <img class='category_img' src='$image' alt='$category'>";
        echo
            "<a href='/categorypage/categorypage.php?id=$categoryid' 
            class='category_title'>$category</a>
        </div>";

    endwhile;
    ?>
</section>