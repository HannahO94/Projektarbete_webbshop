<?php

require_once 'header.php';
require_once '../config/db.php';



$msg = "";

        $sql = "SELECT * FROM categories";
        $stmt = $db->prepare($sql);
        $stmt->execute();

        $option_value = "";
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $categoryid = htmlspecialchars($row['categoryid']);
            $category = htmlspecialchars($row['category']);
            $option_value .= "<option value='$categoryid'>$category</option>";
        }



    if($_SERVER['REQUEST_METHOD'] === 'POST') :
        
        $sql = "INSERT INTO products (title, description, categoryid, price)
                VALUES (:title, :description, :categoryid, :price) ";
           
        $stmt = $db->prepare($sql);

        
        $title = htmlspecialchars($_POST['title']);
        $description = htmlspecialchars($_POST['description']);
        $price = htmlspecialchars($_POST['price']);
        $categoryid = $_POST['category'];

        // $image = $_FILES['image']['name'];
        // $link = $_POST['link'];
        // $target = "../images/".basename($image);
        

        
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':categoryid', $categoryid);


        // $stmt->bindParam(':image', $image);
        // $stmt->bindParam(':link', $link);
        // $stmt->bindParam(':published', $published);
       
       
        $stmt->execute(); 

        
        // if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        //     $msg = "Bilden är uppladdad!";
        // }else{
        //     $msg = "Ingen bild är uppladdad!";
        // }
    endif;


?>

<section class="page-title-container">

<h1 class="page-title">Lägg till en ny produkt</h1>

</section>

<section class="product-form">

<form action="#" method="POST" enctype="multipart/form-data">

<div class="product_field-name">
<label for="title">Produkt namn: </label><br>
<input type="text" name="title">
</div>

<div class="product_field-price">
<label for="price">Pris: </label><br>
<input type="text" name="price">
</div>

<div class="product_field-instock">
<label for="instock">Ange lagerstatus: <br>
<input type="number" min="0" max="500" name="instock">
</div>

<div class="product_field-category">
<label for="category">Kategori: </label><br>
<select name="category">
<option value="">Välj en kategori...</option>
<?php echo $option_value; ?>

</select>
</div>

<div class="product_field-img">
<label for="product_upload-img">Ladda upp en produktbild: </label><br>
<input type="file" name="product_upload-img">
</div>

<div class="product_field-description">
<label for="description">Beskrivning: </label><br>
<textarea name="description" placeholder="Beskrivning av produkt.." cols="10" rows="8"></textarea>
</div>

<div class="product_field-submit">
<input type="submit" value="Lägg till ny produkt">
</div>


</form>
</section>




<?php require_once 'footer.php';?>

