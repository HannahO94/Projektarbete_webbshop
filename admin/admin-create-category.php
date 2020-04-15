<?php 
require_once '../config/db.php';


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


<form action="#" method="POST" enctype="multipart/form-data">

<div class="category_field-name">
<label for="category">Namn på kategori: </label><br>
<input type="text" name="category">
</div>

<div class="category_field-img">
<label for="category-img">Ladda upp en katagoribild: </label><br>
<input type="file" name="category-img">
</div>

<div class="category_field-submit">
<input type="submit" onclick='return myReload()' value="Lägg till ny kategori">
</div>


</form>
