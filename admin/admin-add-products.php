<?php

require_once 'header.php';
require_once '../config/db.php';



//$msg = "";

        $sql = "SELECT * FROM webshop_categories";
        $stmt = $db->prepare($sql);
        $stmt->execute();

        $option_value = "";
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $categoryid = htmlspecialchars($row['categoryid']);
            $category = htmlspecialchars($row['category']);
            $option_value .= "<option value='$categoryid'>$category</option>";
        }



    if($_SERVER['REQUEST_METHOD'] === 'POST') :
        
        $sql = "INSERT INTO webshop_products (title, description, categoryid, price, quantity, productimg)
                VALUES (:title, :description, :categoryid, :price, :quantity, :productimg) ";
           
        $stmt = $db->prepare($sql);

        
        $title = htmlspecialchars($_POST['title']);
        $description = htmlspecialchars($_POST['description']);
        $price = htmlspecialchars($_POST['price']);
        $quantity = htmlspecialchars($_POST['quantity']);
        $categoryid = $_POST['category'];

        
        $uploadFolder = '../images/';

        
        $imageData = array();

        foreach ($_FILES['productimg']['tmp_name'] as $key => $image) {
            $imageTmpName = $_FILES['productimg']['tmp_name'][$key];
            $imageName = $_FILES['productimg']['name'][$key];
            $result = move_uploaded_file($imageTmpName,$uploadFolder.$imageName);
            array_push($imageData, $imageName);
        };

        $imageUpload = serialize($imageData);


        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':categoryid', $categoryid);
        $stmt->bindParam(':productimg', $imageUpload);

 
       
       
        $stmt->execute(); 

        
        // if (move_uploaded_file($_FILES['productimg[]']['tmp_name'], $target)) {
        //     $msg = "Bilden är uppladdad!";
        // }else{
        //     $msg = "Ingen bild är uppladdad!";
        // }
    endif;


?>

<section class="page-title-container">



</section>

<section class="product-form">
    
    <form action="#" method="POST" enctype="multipart/form-data" class="form-container">
    <div class="form-container__heading">
        <h1 class="page-title form-container__heading-text">Lägg till en ny produkt</h1>
    </div>
    <div class="product_field-name form-container__box">
        <label for="title">Produkt namn: </label><br>
        <input type="text" name="title" class="form-container__box-input">
    </div>

    <div class="product_field-price form-container__box">
        <label for="price">Pris: </label><br>
        <input type="text" name="price" class="form-container__box-input">
    </div>

    <div class="product_field-quantity form-container__box">
        <label for="quantity">Ange lagerstatus: <br>
        <input type="number" min="0" max="500" name="quantity" class="form-container__box-input">
    </div>

    <div class="product_field-category form-container__box">
        <label for="category">Kategori: </label><br>
        <select name="category" class="form-container__box-input">
            <option value="">Välj en kategori...</option>
            <?php echo $option_value; ?>

        </select>
    </div>

    <div class="product_field-img form-container__image">
        <label for="product-img">Ladda upp en produktbild: </label><br>
        <input type="file" name="productimg[]" multiple="multiple" class="form-container__image-input">
    </div>

    <div class="product_field-description form-container__description">
        <label for="description">Beskrivning: </label><br>
        <textarea name="description" placeholder="Beskrivning av produkt.." cols="10" rows="8" class="form-container__description-input"></textarea>
    </div>
    <br>
    <div class="product_field-submit form-container__submit">
        <input type="submit" value="Lägg till ny produkt" class="form-container__submit-button">
    </div>


    </form>
</section>


<button><a href="admin-products.php">Tillbaka</a></button>




<?php require_once '../footer.php';?>