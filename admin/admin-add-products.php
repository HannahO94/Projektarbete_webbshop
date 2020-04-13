<?php

require_once 'header.php';
//require_once 'db.php';

?>


<div>Admin</div>
<nav><ul>
    <!-- Ska sätta css display none i den inre listan som togglas men hjälp av javascript? -->
        <li>ADMIN
            <ul id="hide-sub-list" style="display: none;"> 
                <li>Kategorier</li>
                <li>Produkter</li>
                <li>Beställningar</li>
            </ul>
        </li>
        <li>WEBBSHOPPEN</li>
    </ul>
</nav>


<h1 class="page-title">Lägg till en ny produkt</h1>

</section>

<section class="product-form">

<form action="#" method="POST" enctype="multipart/form-data">

<div class="product_field-name">
<label for="product">Produkt namn: </label><br>
<input type="text" name="product">
</div>

<div class="product_field-price">
<label for="price">Pris: </label><br>
<input type="text" name="price">
</div>

<div class="product_field-category">
<label for="category">Kategori: </label><br>
<select id="category">
<option value="">Välj en kategori...</option>
<option value=""></option>
<option value=""></option>
<option value=""></option>
</select>
</div>

<div class="product_field-img">
<label for="product_upload-img">Ladda upp en produktbild: </label><br>
<input type="file" name="product_upload-img">
</div>

<div class="product_field-description">
<label for="product-description">Beskrivning: </label><br>
<textarea name="product-description" placeholder="Beskrivning av produkt.." cols="10" rows="8"></textarea>
</div>

<div class="product_field-submit">
<input type="submit" value="Lägg till ny produkt">
</div>


</form>
</section>




<?php require_once 'footer.php';?>

