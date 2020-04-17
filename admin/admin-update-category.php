<?php
require_once '../config/db.php';
require_once 'header.php';

$imageold = "";

if(isset($_GET['id'])){
    $id = htmlspecialchars($_GET['id']);
    $sql = "SELECT * FROM webshop_categories WHERE categoryid =:id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    
    if($stmt->rowCount() > 0){
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $category = $row['category'];   
        $imageold = $row['image'];
        
    }else {
        header('Location:admin-category.php');
        exit;
    }
}else {
    header('Location:admin-category.php');
    exit;
}
$msg = "";

if($_SERVER['REQUEST_METHOD'] === 'POST') :
    $category = htmlspecialchars($_POST['category']);
    $id = htmlspecialchars($_POST['id']);
    if ($_FILES['image']['name'] ==''){
        $image = $imageold;
    }else {
        $image = $_FILES['image']['name'];
        $target ="../images/".basename($image);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $msg = "Bilden är uppladdad!";
        }else{
            $msg = "Ingen bild är uppladdad!";
        }
    }
     
    $sql = "UPDATE webshop_categories SET category=:category, image=:image WHERE categoryid=:id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':category', $category);
    $stmt->bindParam(':image', $image);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    
    header('Location:admin-category.php');
   
    
endif;
?>

<form action="#" method="POST" enctype="multipart/form-data">
    <div class="">
        <input type="text" placeholder="Namn på kategori" value='<?php echo $category; ?>' name="category" class="">
    </div>
    <div class="">
        <label for="image">Ladda upp en bild:</label><br>
        <input type="file" name="image" class="">     
        <?php echo $msg; ?>
    </div>
    <div class="">
            <input type="submit" value="Uppdatera" class="">
    </div>
<input type="hidden" name="id" value="<?php echo $id ?>"> 
</form>

<?php 
if (!$imageold === false){
    echo "<img src='../images/$imageold' width='200px' class=''><br>
    ";
}
?>
<br><br>
<button><a href="admin-category.php">Tillbaka</a></button>
<?php  require_once '../footer.php'; ?>
<!-- <a href='delete-img.php?id=$id' class='btn btn-danger'>Ta bort bild</a> -->