<?php 
require_once '../config/db.php';
require_once 'header.php';

$nameErr = "";
$msg = "";
$errors = "";

if($_SERVER['REQUEST_METHOD'] === 'POST') :
    $uploadOk = 1;
    $error = array();
    $imageFileType = strtolower(pathinfo($target,PATHINFO_EXTENSION));
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["category-img"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            // $error[] = "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target)) {
        // $error[] = "Sorry, file already exists.";
        $uploadOk = 0;
        $image = "";
    }
    // Check file size
    if ($_FILES["category-img"]["size"] > 500000) {
        // $error[] = "Sorry, your file is too large.";
        $uploadOk = 0;
        $image = "";
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        // $error[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
        $image = "";
    }
    // Check if $uploadOk is set to 0 by an error
    // if ($uploadOk == 0) {
    //     $msg = "Ingen fil laddades upp.";
    //     $image = "";
    // // if everything is ok, try to upload file
    // } 
    else {
        if (move_uploaded_file($_FILES["category-img"]["tmp_name"], $target)) {
            // echo "The file ". basename( $_FILES["category-img"]["name"]). " has been uploaded.";
            $image = $_FILES['category-img']['name'];
            $target = "../images/".basename($image);
            
        } else {
            echo "Sorry, there was an error uploading your file.";
            
        }
    }
   
    
    if (empty($_POST["category"])) {
        $nameErr = "Kategorinamn måste fyllas i";
      }
  
    else if (!empty($_POST["category"])) {
        $category = test_input($_POST["category"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-ÖA-Ö\s]*$/",$category)) {
          $nameErr = "Endast bokstäver och mellanslag är tillåtet";
      }
         else {
            $sql = "INSERT INTO webshop_categories (category, image)
            VALUES (:category, :image) ";
       
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':category', $category);
            $stmt->bindParam(':image', $image);
            $stmt->execute(); 
            // header('Location:admin-category.php');

        }
    }

        // $category = htmlspecialchars($_POST['category']);
        // if(count($error) > 0 && $image != ""){        
        //     foreach($error as $e){
        //         $errors .= "<div class='error'><p> $e </p></div><br />";      
        //     }
        // }   
        // else{
        //         $errors = "<div class='suc'><p> Din Produkt är sparad!</p></div>";
        // }
        
    endif;
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
     
 
   
?>


<div class="form-container__heading">
<h3 class="form-container__heading-text">Lägg till en kategori</h3>
</div><br>
<form action="#" method="POST" enctype="multipart/form-data" class="form-container">
    <div class="category_field-name form-container__box">
        <label for="category">Namn på kategori: </label><br>
        <input type="text" name="category" class="form-container__box-input" placeholder="Ange kategorinamn">
        <p class="error"><?php echo $nameErr; ?></p>
    </div>

    <div class="category_field-img form-container__image">
        <label for="category-img">Ladda upp en katagoribild: </label><br>
        <input type="file" name="category-img" class="form-container__image-input">
        <p class="error"><?php 
        // echo $msg;
        echo $errors;
        ?></p>

    </div>

    <div class="category_field-submit form-container__submit">
        <input type="submit"  value="Lägg till ny kategori" class="form-container__submit-button">
    </div>
    
    <!-- onclick='return myReload()' -->
</form>



