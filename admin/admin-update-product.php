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


        // $imageold = $row['image'];
        
    }else {
        header('Location:admin-products.php');
        exit;
    }
}else {
    header('Location:admin-products.php');
    exit;
}

$sql = "SELECT * FROM webshop_categories";
$stmt = $db->prepare($sql);
$stmt->execute();

$option_value = "";
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $categoryid = htmlspecialchars($row['categoryid']);
    $category = htmlspecialchars($row['category']);
    $option_value .= "<option value='$categoryid'>$category</option>";
}
// $msg = "";

// if($_SERVER['REQUEST_METHOD'] === 'POST') :
//     $category = htmlspecialchars($_POST['category']);
//     $id = htmlspecialchars($_POST['id']);
//     if ($_FILES['image']['name'] ==''){
//         $image = $imageold;
//     }else {
//         $image = $_FILES['image']['name'];
//         $target ="../images/".basename($image);
//         if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
//             $msg = "Bilden är uppladdad!";
//         }else{
//             $msg = "Ingen bild är uppladdad!";
//         }
//     }
     
//     $sql = "UPDATE webshop_categories SET category=:category, image=:image WHERE categoryid=:id";
//     $stmt = $db->prepare($sql);
//     $stmt->bindParam(':category', $category);
//     $stmt->bindParam(':image', $image);
//     $stmt->bindParam(':id', $id);
//     $stmt->execute();
    
//     header('Location:admin-category.php');
   
    
// endif;
?>


<section class="page-title-container">

<h1 class="page-title">Uppdatera produkt</h1>

</section>

<section class="product-form">

<form action="#" method="POST" enctype="multipart/form-data">

<div class="product_field-name">
<label for="title">Produkt namn: </label><br>
<input type="text" name="title"value='<?php echo $title; ?>'>
</div>

<div class="product_field-price">
<label for="price">Pris: </label><br>
<input type="text" name="price" value='<?php echo $price; ?>'>
</div>

<div class="product_field-quantity">
<label for="quantity">Ange lagerstatus: <br>
<input type="number" min="0" max="500" name="quantity" value='<?php echo $quantity; ?>'>
</div>

<div class="product_field-category">
<label for="category">Kategori: </label><br>
<select name="category">
<option value=''>Välj en kategori...</option>
<?php echo $option_value; ?>

</select>
</div>

<div class="product_field-img">
<label for="product-img">Ladda upp en produktbild: </label><br>
<input type="file" name="productimg[]" multiple="multiple">
</div>

<div class="product_field-description">
<label for="description">Beskrivning: </label><br>
<textarea name="description" Placeholder="Beskrivning av produkt" cols="10" rows="8"><?php echo $description; ?></textarea>
</div>

<div class="product_field-submit">
<input type="submit" value="Uppdatera produkt">
</div>


</form>
</section>


<button><a href="admin-products.php">Tillbaka</a></button>




<?php 
if (!$imageold === false){
    echo "<img src='../images/$imageold' width='200px' class=''><br>
    ";
}
?>

<?php  require_once 'footer.php'; ?>