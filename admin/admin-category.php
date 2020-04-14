<?php 
require_once 'header.php';
require_once '../config/db.php';

$sql = "SELECT * FROM categories"; 
$stmt = $db->prepare($sql);
$stmt->execute();
//$stmt är ett objekt som innehåller tabellen


$list = '<ul>';

//hämtar en rad i taget med fetch. då kan man loopa över de rader som finns. 

while($row = $stmt->fetch(PDO::FETCH_ASSOC)){  
    $category = htmlspecialchars($row['category']);
    $id = htmlspecialchars($row['categoryid']);
    $list .= "<li> $category <button>Uppdatera</button><button>Ta bort</button></li>";

    }
    $list .= '</ul>';  

    if($_SERVER['REQUEST_METHOD'] === 'POST') :
        
        $sql = "INSERT INTO categories (category,  categoryimg)
                VALUES (:category, :categoryimg) ";
           
        $stmt = $db->prepare($sql);

        
        $category = htmlspecialchars($_POST['category']);
        $image = $_FILES['category-img']['name'];
        $target = "../images/".basename($image);
        

        
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':categoryimg', $image);

    
       
       
        $stmt->execute(); 

        
        if (move_uploaded_file($_FILES['category-img']['tmp_name'], $target)) {
            $msg = "Bilden är uppladdad!";
        }else{
            $msg = "Ingen bild är uppladdad!";
        }
    endif;
   
?>

<h1>Kategorier</h1>
<a href="index.php">Hem</a>
<h3>Kategori:</h3>
<?php echo $list;?>

<h3>Lägg till en kategori</h3>

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
<input type="submit" value="Lägg till ny kategori">
</div>


</form>


<?php require_once "footer.php";?>




<!-- <script>
    function myFunction() {
    let remove = confirm("Är du säker på att du vill radera inlägget");
    if (remove == false) {
        return false;
    } 

}
</script> -->