<?php
require_once '../config/db.php';

//require_once 'index.html';

  $sql = "SELECT * FROM webshop_products";
  $stmt = $db->prepare($sql);
  $stmt->execute();

  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){    
    $name = htmlspecialchars($row["productid"]);

  };

require_once "../header_extern.php";

//echo $_GET['search'];
$search = $_GET['id'];

?>

<h1>Sök</h1>
<h2><?php echo $search ?></h2>

<!--i nedan div mha php rita ut produktkort-->
<div id="searched-result" class="search-result">


</div>

<button class="btn-back">Tillbaka</button>


<?php
require_once "../footer.php"
?>