<?php 
require_once '../config/db.php';
require_once 'header.php';


if($_SERVER['REQUEST_METHOD'] === 'POST') :
        
        $sql = "INSERT INTO webshop_categories (category, image)
                VALUES (:category, :image) ";
           
        $stmt = $db->prepare($sql);

        
        $category = htmlspecialchars($_POST['category']);
        $image = $_FILES['category-img']['name'];
        $target = "../images/".basename($image);
        

        
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':image', $image);

    
       
       
        $stmt->execute(); 

        
        if (move_uploaded_file($_FILES['category-img']['tmp_name'], $target)) {
            $msg = "Bilden är uppladdad!";
        }else{
            $msg = "Ingen bild är uppladdad!";
        }
    endif;
 
   
?>


<form action="#" method="POST" enctype="multipart/form-data" class="form-container">
    <div class="form-container__heading">
        <h3 class="form-container__heading-text">Lägg till en kategori</h3>
    </div><br>
    <div class="category_field-name form-container__box">
        <label for="category">Namn på kategori: </label><br>
        <input type="text" name="category" class="form-container__box-input" placeholder="Ange kategorinamn">
    </div>

    <div class="category_field-img form-container__image">
        <label for="category-img">Ladda upp en katagoribild: </label><br>
        <input type="file" name="category-img" class="form-container__image-input">
    </div>

    <div class="category_field-submit form-container__submit">
        <input type="submit" onclick='return myReload()' value="Lägg till ny kategori" class="form-container__submit-button">
    </div>


</form>
</div>
