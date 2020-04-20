<?php
require_once '../config/db.php';
require_once 'header.php';

$imageold = "";


if(isset($_GET['id'])){
    $id = htmlspecialchars($_GET['id']);
    $sql = "SELECT * FROM webshop_products WHERE productid =:id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    
    if($stmt->rowCount() > 0){
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $productid = htmlspecialchars($row['productid']);
        $title = htmlspecialchars($row['title']); 
        $price = htmlspecialchars($row['price']);
        $quantity = htmlspecialchars($row['quantity']);
        $description = htmlspecialchars($row['description']);
        $product_categoryid = htmlspecialchars($row['categoryid']);

        $imageold = unserialize($row['productimg']);
        
        
    }else {
        header('Location:admin-products.php');
        exit;
    }
}else {
    header('Location:admin-products.php');
    exit;
}
print_r($imageold);


$query ="SELECT * FROM webshop_categories WHERE categoryid = :categoryid";
$statment = $db->prepare($query);
$statment->bindParam(':categoryid', $product_categoryid);
$statment->execute();

while($row = $statment->fetch(PDO::FETCH_ASSOC)){
    $product_category = htmlspecialchars($row['category']);
}


$sql = "SELECT * FROM webshop_categories WHERE NOT categoryid = :categoryid";
$stmt = $db->prepare($sql);
$stmt->bindParam(':categoryid', $product_categoryid);

$stmt->execute();

$option_value = "";
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $categoryid = htmlspecialchars($row['categoryid']);
    $category = htmlspecialchars($row['category']);
    $option_value .= "<option value='$categoryid'>$category</option>";
}



if(isset($_POST['submit'])) :
    $title = htmlspecialchars($_POST['title']);
    $id = htmlspecialchars($_POST['id']);
    $price = htmlspecialchars($_POST['price']);
    $quantity = htmlspecialchars($_POST['quantity']);
    $description = htmlspecialchars($_POST['description']);
    $categoryid = $_POST['category'];


    $sql = "UPDATE webshop_products SET title = :title, price = :price, quantity = :quantity, description = :description, categoryid = :categoryid   WHERE productid = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':quantity', $quantity);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':categoryid', $categoryid);
    //$stmt->bindParam(':productimg', $imageUpload);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    
    // header('Location:admin-products.php');
   
    
endif;

$msg = "";
$result ="";
if(isset($_POST['submitimg'])){

        $id = htmlspecialchars($_POST['id']);
        $uploadFolder = '../images/';
        $imageData = array();

        foreach ($_FILES['productimg']['tmp_name'] as $key => $image) {
            $imageTmpName = $_FILES['productimg']['tmp_name'][$key];
            $imageName = $_FILES['productimg']['name'][$key];
            $result = move_uploaded_file($imageTmpName,$uploadFolder.$imageName);
            array_push($imageData, $imageName);
        }
        $imageUpload = serialize($imageData);
        



    //$imageUpload = serialize($imageData);
    $sql = "UPDATE webshop_products SET productimg = :productimg WHERE productid = :id";
    $stmt = $db->prepare($sql);   
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':productimg', $imageUpload);
    $stmt->execute();

    if ($result) {
        $msg = "Bilden är uppladdad!";
    }else{
        $msg = "Ingen bild är uppladdad!";
    }
            
 

    header("Location:admin-update-product.php?id=$id");
    }
?>



<section class="product-form">

<form action="#" method="POST" enctype="multipart/form-data" class="form-container">
<h1 class="page-title">Uppdatera produkt</h1>

<div class="product_field-name form-container__box">
<label for="title">Produkt namn: </label><br>
<input type="text" name="title"value='<?php echo $title; ?>' class="form-container__box-input">
</div>

<div class="product_field-price form-container__box">
<label for="price">Pris: </label><br>
<input type="text" name="price" value='<?php echo $price; ?>' class="form-container__box-input">
</div>

<div class="product_field-quantity form-container__box">
<label for="quantity">Ange lagerstatus: <br>
<input type="number" min="0" max="500" name="quantity" value='<?php echo $quantity; ?>' class="form-container__box-input">
</div>

<div class="product_field-category form-container__box">
<label for="category">Kategori: </label><br>
<select name="category" class="form-container__box-input">
<option value='<?php echo $product_categoryid;?>'><?php echo $product_category;?></option>
<?php echo $option_value; ?>

</select>
</div>
<div class="product_field-description form-container__description">
<label for="description">Beskrivning: </label><br>
<textarea name="description" Placeholder="Beskrivning av produkt" class="form-container__description-input" cols="10" rows="8"><?php echo $description; ?></textarea>
</div>

<div class="product_field-submit form-container__submit">
<input type="submit" name="submit" value="Uppdatera produkt" class="form-container__submit-button">
</div>
<input type="hidden" name="id" value="<?php echo $id ?>"> 


</form>
</section>

<section>
<form action="#" method="POST" enctype="multipart/form-data" class="form-container">
<h3>Uppdatera bild: </h3>

<div class="product_field-img form-container__image">
<label for="product-img">Ladda upp en produktbild: </label><br>
<input type="file" name="productimg[]" multiple="multiple">
<?php echo $msg; ?>
</div>

<div class="product_field-submit form-container__submit">
<input type="submit" name="submitimg" value="Uppdatera bild" class="form-container__submit-button">
</div>
<input type="hidden" name="id" value="<?php echo $id ?>"> 
</form>
</section>


<?php 
    
    foreach ($imageold as $key => $value) {
        if($imageold[0] == ""){
            echo "ingen bildfil finns tillgänglig";
        }else
        echo "<img src='../images/$value' width='200px' class=''><br><button>Radera bild</button><br>
        ";
    }




?>


<button><a href="admin-products.php">Tillbaka</a></button>
<?php  require_once '../footer.php'; ?>

