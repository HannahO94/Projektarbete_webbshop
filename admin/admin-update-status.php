<?php
require_once '../config/db.php';
require_once 'header.php';


$currentStatus = "";

//Hämtar ordernummer från databasen

if (isset($_GET['id'])) {
  $id = htmlspecialchars($_GET['id']);
  $sql = "SELECT * FROM webshop_orders WHERE orderid =:id";
  $stmt = $db->prepare($sql);
  $stmt->bindParam(':id', $id);
  $stmt->execute();

  if ($stmt->rowCount() > 0) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $orderid = $row['orderid'];
    $currentStatus = $row['status'];
    //echo $currentStatus
  } else {
    header('Location:admin-order.php');
    exit;
  }
} else {
  header('Location:admin-order.php');
  exit;
}


// if ($_SERVER['REQUEST_METHOD'] === 'POST') :
//   $id = htmlspecialchars($_POST['orderid']);

//   if (isset($_POST["orderid"])) {
//   }

// endif;
?>

<section class="form_container">

  <h3 class="page-title form-container__heading-text">Uppdatera orderstatus</h3>

  <h3>Ordernummer: <?php echo $orderid ?></h3>
  <br>
  <form action="#" method="POST" class="form-container">
    <div class="form-container__box">
      <select name="status" class="form-container__box-input">
        <option value="">Välj status</option>
        <option value="">Ny (1)</option>
        <option value="">Behandlas (2)</option>
        <option value="">Slutförd (3)</option>
      </select>
    </div>

    <div class="form-container__submit">
      <input type="submit" value="Uppdatera" class="form-container__submit-button">
    </div>
    <input type="hidden" name="orderid" value="<?php echo $id ?>">
  </form>


</section>

<br><br>
<button class="back_btn"><a href="admin-order.php">Tillbaka</a></button>
<?php require_once '../footer.php'; ?>
<!-- <a href='delete-img.php?id=$id' class='btn btn-danger'>Ta bort bild</a> -->