<?php
require_once "../header_extern.php";
require_once "../config/db.php";


//HÄMTA KUNDUPPGIFTER FRÅN DATABASEN 
//ELLER är det bättre att hämta från formuläret med eventlistener? (Se filen orderConfirmation.js)

// Hämta orderid (hur då??)
//$id = htmlspecialchars($_GET['id']);

// Hämtar alla kolumner från tabellen "webshop_orders" i db
// $stmt = $db->prepare("SELECT  
//                     `orderid`,
//                     `orderdate`,
//                     `name`, 
//                     `email`, 
//                     `phone`, 
//                     `street`,
//                     `zip`
//                     `city`
//                     FROM `webshop_order` 
//                     WHERE orderid=:orderid");
// $stmt->bindParam(':orderid', $id);
// $stmt->execute();

// echo "<div class='product-info'>";

// // Hämtar raderna som finns i varje kolumn
// $row = $stmt->fetch(PDO::FETCH_ASSOC);

// $orderid = htmlspecialchars($row['orderid']);
// $orderdate = htmlspecialchars($row['orderdate']);
// $name = htmlspecialchars($row['name']);
// $email = htmlspecialchars($row['email']);
// $phone = htmlspecialchars($row['phone']);
// $street = htmlspecialchars($row['street']);
// $zip = htmlspecialchars($row['zip']);
// $city = htmlspecialchars($row['city']);

// 
?>




<h1>Orderbekräftelse</h1>

<p>Ordernummer</p>
<p>Orderdatum</p>

<h2>Beställda produkter</h2>
<table>
  <thead>
    <th>Produkt</th>
    <th>Pris</th>
    <th>Antal</th>
    <th>Osv</th>
  </thead>
  <tbody id="ordered-products" class="">
    <!--här jobbar getOrderedProducts()-->
  </tbody>

  <h2>Kunduppgifter</h2>

  <!--här hämtas kund/kontaktdetaljer från orderformuläret-->
  <div id="contact-details"></div>

</table>

<script type="application/javascript" src="orderConfirmation.js"></script>
</body>

</html>

<?php
require_once "../footer.php"
?>