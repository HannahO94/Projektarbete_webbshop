<?php 
require_once '../config/db.php';
require_once 'header.php';


if($_SERVER['REQUEST_METHOD'] === 'POST') :

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target,PATHINFO_EXTENSION));
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["category-img"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
        $image = "";
    }
    // Check file size
    if ($_FILES["category-img"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
        $image = "";
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
        $image = "";
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        $image = "";
    // if everything is ok, try to upload file
    } 
    else {
        if (move_uploaded_file($_FILES["category-img"]["tmp_name"], $target) && $uploadOk == true) {
            echo "The file ". basename( $_FILES["category-img"]["name"]). " has been uploaded.";
            $image = $_FILES['category-img']['name'];
            $target = "../images/".basename($image);
        } else {
            echo "Sorry, there was an error uploading your file.";
            
        }
    }





        
        $sql = "INSERT INTO webshop_categories (category, image)
                VALUES (:category, :image) ";
           
        $stmt = $db->prepare($sql);

        
        $category = htmlspecialchars($_POST['category']);
        
        

        
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':image', $image);

    
       
       
        $stmt->execute(); 

        
        // if (move_uploaded_file($_FILES['category-img']['tmp_name'], $target)) {
        //     $msg = "Bilden är uppladdad!";
        // }else{
        //     $msg = "Ingen bild är uppladdad!";
        // }
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
