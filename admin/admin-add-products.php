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



<?php 
require_once 'admin-add-product-form.php';
require_once '../footer.php';?>

